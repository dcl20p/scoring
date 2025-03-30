<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisteredController extends Controller
{
    /**
     * Register a new user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerAdmin(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

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
            event(new Registered($user));
            
            DB::commit();

            $deviceName = $request->device_name ?? $request->userAgent() ?? 'unknown';
            $token = $user->createToken($deviceName)->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => __('auth.registration_success'),
                'data' => [
                    'school' => [
                        'id' => $school->id,
                        'name' => $school->name,
                        'code' => $school->code,
                    ],
                    'user' => [
                        'id' => $user->id,
                        'first_name' => $user->first_name,
                        'last_name' => $user->last_name,
                        'email' => $user->email,
                        'role' => $user->role,
                    ],
                    'verify_url' => route('verification.notice'),
                    'token' => $token,
                    'token_type' => 'Bearer',
                ]
            ], 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('API Registration error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => __('auth.registration_failed'),
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Validate the data
     * 
     * @param array $data
     * @return \Illuminate\Validation\Validator
     */
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
