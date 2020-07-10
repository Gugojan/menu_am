<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    public function socialites($website){
        return socialite::driver($website)->redirect();

    }

    public function socialiteCallback($website){
        $social_user = Socialite::driver($website)
            ->stateless()
            ->user();

//        dd($social_user->avatar);
        $user = User::firstOrCreate([
            'email' => $social_user->email,
                'name' => $social_user->name ?? $social_user->nickname,
                'avatar' => $social_user->avatar,
                'password' => Hash::make(Str::random(20))
            ]
        );

        Auth::login($user);
        return redirect('user/order');

    }

    public function redirectTo(){
        switch (auth()->user()->user_type_id){
            case 1:
            $this->redirectTo = 'admin/product';
            return $this->redirectTo;
            break;
            case 2:
            $this->redirectTo = 'user/order';
            return $this->redirectTo;
            break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
