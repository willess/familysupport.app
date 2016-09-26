<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */

    protected $redirectTo = '/home';

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

        if(isset($data['organisation']) && isset($data['country']))
        {
            return Validator::make($data, [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'address' => 'required|max:255',
                'housenumber' => 'required|max:50',
                'zip' => 'required|max:10',
                'city' => 'required|max:100',
                'phone_number' => 'required|max:15',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'organisation' => 'required',
                'country' => 'required',
            ]);
        }
        else
        {
            return Validator::make($data, [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'address' => 'required|max:255',
                'housenumber' => 'required|max:50',
                'zip' => 'required|max:10',
                'city' => 'required|max:100',
                'phone_number' => 'required|max:15',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        if(isset($data['organisation']) && isset($data['country']))
        {
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'housenumber' => $data['housenumber'],
                'zip' => $data['zip'],
                'city' => $data['city'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'mentor' => true,
                'mentor_accepted' => false,
                'organisation' => $data['organisation'],
                'country' => $data['country'],
            ]);
        }
        else
        {
//            $user = new User();
//            $user->first_name = $data['first_name'];
//            $user->last_name = $data['last_name'];
//            $user->address = $data['address'];
//            $user->housenumber = $data['housenumber'];
//            $user->zip = $data['zip'];
//            $user->city = $data['city'];
//            $user->phone_number = $data['phone_number'];
//            $user->email = $data['email'];
//            $user->password = $data['password'];
//            $user->mentor = false;
//
//            $user->save();

            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'housenumber' => $data['housenumber'],
                'zip' => $data['zip'],
                'city' => $data['city'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'mentor' => false,
            ]);
        }
    }
}
