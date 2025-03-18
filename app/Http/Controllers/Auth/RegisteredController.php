<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

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
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            event(new Registered($user = User::create($request->all())));
        } catch (\Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());
            return redirect()->back()->withInput($request->except('password', 'password_confirmation'))
                ->withErrors(['registration_code' => $e->getMessage()]);
        }

        Auth::login($user);

        return redirect('/admin/dashboard');
    }

    protected function validator(array $data)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=> ['required', 'string','max:255'],
            'email'=> ['required', 'string','email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Password::min(8)],
            'role' => ['required', 'string', 'in:SUPER_ADMIN,ADMIN,TEACHER,STUDENT'],
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
