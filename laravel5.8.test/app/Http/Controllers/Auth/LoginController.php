<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $userRepository;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->userRepository = new UsersRepository;
    }

    public function authVk() {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function responseVk() {
        $userData = Socialite::driver('vkontakte')->user();
        $user = $this->userRepository->getOrCreateUserBySocData($userData, 'vkontakte');

        Auth::login($user);

        return redirect('/');
    }

    public function authFb() {
        return Socialite::driver('facebook')->redirect();
    }

    public function responseFb() {
        $userData = Socialite::driver('facebook')->user();
        $user = $this->userRepository->getOrCreateUserBySocData($userData, 'facebook');
        Auth::login($user);

        return redirect('/');
    }
}
