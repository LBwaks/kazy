<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, [
            'user_type'=>['required'],
            'id_no' => ['required', 'string', 'min:6','max:10'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tell' => ['required', 'string', 'min:10','max:10'],
            'gender' => ['required', 'string', 'min:4','max:6'],
            'dob' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'profile_image'=>['sometimes','mimes:jpeg,png,jpg|max:2048|nullable']



        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
    protected function create(array $data)
    {
        if(request()->hasFile('profile_image')){
            $file=request()->file('profile_image');
            $name=uniqid().".".$file->getClientOriginalExtension();
            $file->move('images/profile/',$name);
            return User::create([
                'user_type'=>$data['user_type'],
                'id_no'=>$data['id_no'],
                'name' => $data['name'],
                'email' => $data['email'],
                'tell'=>$data['tell'],
                'gender'=>$data['gender'],
                'dob'=>$data['dob'],
                'location'=>$data['location'],
                'address'=>$data['address'],
                'profile_image'=>$name,
                'password' => Hash::make($data['password']),
            ]);
        }
        return User::create([
            'user_type'=>$data['user_type'],
            'id_no'=>$data['id_no'],
            'name' => $data['name'],
            'email' => $data['email'],
            'tell'=>$data['tell'],
            'gender'=>$data['gender'],
            'dob'=>$data['dob'],
            'location'=>$data['location'],
            'address'=>$data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
