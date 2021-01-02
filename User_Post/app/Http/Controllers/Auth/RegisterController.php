<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = 'newlogin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'min:8', 'max:255'],
            'username' => ['required', 'string', 'min:8', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'featue_url' => [],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(array $data)
    {
        if (isset($data['featue_url'])) {
            $feature_url = request()->file('featue_url');
            $feature_name = time() . '.' . $feature_url->getClientOriginalExtension();
            $feature_path = public_path('/image/');
            $feature_url->move($feature_path, $feature_name);
            $user = User::create([
                'full_name' => $data['full_name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'gender' => $data['gender'],
                'featue_url' => '/image/' .  $feature_name,
            ]);
        } else {
            $user =  User::create([
                'full_name' => $data['full_name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'gender' => $data['gender'],
            ]);
        }
        // dd($user->toArray());

        $per = Permission::where('name', 'user')->first();
        $user->permissions()->attach([$per->id]);
        return $user;
    }
}
