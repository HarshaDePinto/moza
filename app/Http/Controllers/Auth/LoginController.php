<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Login;

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
    public function redirectTo()
    {
        //Make Log
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $user->log = 1;
        $user->save();
        $date = date('Y-m-d H:i:s');
        Login::create([
            'user_id' => $user->id,
            'in' => $date
        ]);
        // User role
        $role = Auth::user()->role->name;

        // Check user role
        switch (Auth::user()->role_id) {
            case 1:
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = '/student';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/employer';
                return $this->redirectTo;
                break;

            default:
                $this->redirectTo = '/';
                return $this->redirectTo;
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

    protected function credentials(Request $request)
    {
        return ['email' => $request->email, 'password' => $request->password, 'is_active' => 1, 'log' => 0];
    }

    public function logout(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $user->log = 0;
        $user->save();
        $date = date('Y-m-d H:i:s');
        $login = Login::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
        $login->out = $date;
        $login->save();

        Auth::logout();

        return redirect('/');
    }
}
