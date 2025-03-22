<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisteredController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
}
