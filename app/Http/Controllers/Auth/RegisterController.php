<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\Rank\UserPoint;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\ImageMaker;
use App\Services\UserLocationByIp;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\Email\RegistrationMail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/profile';

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
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'mobilephone' => 'required|string|max:255',
            'businessphone' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'firstname'     => $data['firstname'],
            'surname'       => $data['surname'],
            'email'         => $data['email'],
            'username'      => $data['username'],
            'mobilephone'   => $data['mobilephone'],
            'businessphone' => $data['businessphone'],
            'password'      => bcrypt($data['password']),
        ]);

        RegistrationMail::send($data);
        UserPoint::addPoint(3, 'Registration',$user->id , 1);

        return $user;
    }

    public function redirectToProvider()
    {
        return Socialite::with('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        try{
            $socialUser = Socialite::with('facebook')->user();

        } catch(\Exception $e){
            flash("The system could not connect to Facebook", 'warning');
            return redirect('/');
        }

        $user           = User::where('facebook_id', $socialUser->getId())->first();
        $userEmailCheck = User::where('email', $socialUser->getEmail())->first();

        if (count($user) === 0 && count($userEmailCheck) === 0){
            $data = [
                'firstname'     => explode(' ',$socialUser->getName())[0],
                'surname'       => explode(' ',$socialUser->getName())[1],
                'facebook_id'   => $socialUser->getId(),
                'avatar'        => $socialUser->getAvatar(),
                'email'         => $socialUser->getEmail(),
                'username'      => str_replace(' ','',$socialUser->getName()),
                'password'      => bcrypt(substr(md5(mt_rand()), 0, 7)),
            ];
            $user = User::create($data);
            RegistrationMail::send($data);

            $content = file_get_contents($socialUser->getAvatar());
            file_put_contents(public_path('/photos/user/'.$user->id.'.jpg'), $content);
            ImageMaker::thumbUserImage($user->id.'.jpg');
            $user->avatar =  $user->id.'.jpg';
            $user->save();
        }
        if (count($userEmailCheck) > 0 && count($user) === 0 ){
            $user = $userEmailCheck;
            $user->facebook_id = $socialUser->getId();
            $user->save();
        }


        Auth::login($user);
        return redirect('/profile/');
    }

}
