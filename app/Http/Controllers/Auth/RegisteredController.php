<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\DeviceHelper;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use App\Models\UserDevice;
use App\Models\UserSession;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisteredController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registerAdmin(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            DB::beginTransaction();
            
            $school = School::create([
                'name' => $request->school,
                'email'=> $request->school_email,
                'province' => $request->province,
                'district'=> $request->district,
                'website'=> $request->website,
                'type'=> $request->school_type,

            ]);

            $user = User::create([
                'school_id' => $school->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            event(new Registered($user ));

            DB::commit();

            Auth::login($user);
            
            $this->createUserDeviceAndSession($user, $request);
    
            return redirect(route('dashboard', absolute: false))
                ->with('success', __('auth.registration_success'));

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Registration error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput($request->except('password', 'password_confirmation'))
                ->with('error', __('auth.registration_failed'));
        }
    }

    private function createUserDeviceAndSession(User $user, Request $request): void
    {
        $userAgent = $request->userAgent();
        $ipAddress = $request->ip();
        $deviceId = UserDevice::generateDeviceId($userAgent, $ipAddress, $user->id);
        $deviceName = DeviceHelper::determineDeviceName($userAgent);
        
        // Create or update device record
        UserDevice::updateOrCreate(
            ['user_id' => $userId = $user->id, 'device_id' => $deviceId],
            [
                'device_name' => $deviceName,
                'user_agent' => $userAgent,
                'ip_address' => $ipAddress,
                'last_used_at' => now(),
            ]
        );

        $ttl = config('session.lifetime') * 60;

        // Create session record
        UserSession::create([
            'user_id' => $userId,
            'device_id' => $deviceId,
            'last_active_at' => now(),
            'expires_at' => now()->addSeconds($ttl)
        ]);

        $sessionId = session()->getId(); 

        $this->invalidateOtherSessions($userId, $sessionId, $deviceId);

        // Save session to Redis
        $ttl = config('session.lifetime') * 60;
        Redis::setex("user:{$user->id}:session:device:{$deviceId}", $ttl, $sessionId);
    }

    /**
     * @param int $userId
     * @param string $newSessionId
     * @return void
     */
    private function invalidateOtherSessions(int $userId, string $newSessionId, string $deviceId): void
    {
        // Get old session from Redis
        $oldSessionId = Redis::get("user:{$userId}:session:device:{$deviceId}");

        if ($oldSessionId && $oldSessionId !== $newSessionId) {
            // Delete old session from Redis
            Redis::del("user:{$userId}:session");

            // Delete session from Laravel (if stored in Redis)
            Redis::del(config("database.redis.options.prefix") . $oldSessionId);
        }
    }

    protected function validator(array $data)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=> ['required', 'string','max:255'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(5)
            ],
            'phone' => ['nullable', 'string', 'max:20'],
            'role' => ['required', 'string', 'in:SUPER_ADMIN,ADMIN,TEACHER,STUDENT'],
            'school' => ['required', 'string', 'max:100'],
            'province' => ['nullable', 'string', 'max:50'],
            'district' => ['nullable', 'string', 'max:50'],
            'school_email'=> ['required', 'string', 'email', 'max:255', 'unique:schools,email'],
            'school_type' => ['required', 'string', 'in:UNIVERSITY,SCHOOL,COLLEGE,VOCATIONAL,OTHER'],
            'website' => ['nullable', 'string', 'max:150'],
        ];

        // Super admin registration is a special case handled separately
        if (isset($data['role']) && $data['role'] !== User::ROLE_SUPER_ADMIN) {
            $rules['registration_code'] = ['required', 'string'];
        }

        // Student specific validation
        if (isset($data['role']) && $data['role'] === User::ROLE_STUDENT) {
            $rules['student_id'] = ['required', 'string', 'max:50'];
        }

        return Validator::make($data, $rules);
    }

    public function registerMember(Request $request, $id)
    {
        return view('auth.register-member');
    }
}
