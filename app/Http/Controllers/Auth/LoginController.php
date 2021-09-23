<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\GrantAccess;
// use App\Models\Member;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:member')->except('logout');
        $this->middleware('guest:management')->except('logout');
    }

    public function login()
    {
        if(auth()->check()){
            return redirect('home');
        }
        return view('auth.login');
    }

    public function check_user(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $auth = Auth::attempt(['email' => $email, 'password' => $password]);

        if ($auth) {
            $ga = auth()->user()->access_grant;
            $uga = GrantAccess::where('grant_id', $ga)->get();
            $ugd = $uga[0]->grant_desc;

            Auth::guard($ugd);
            $request->session()->regenerate();

            $uemail = auth()->user()->email;
            $umcard = auth()->user()->matrix_card;

            $request->session()->put('user_email', $uemail);
            $request->session()->put('user_matric', $umcard);

            return redirect('home');
        } else {
            return redirect('login');
        }
    }
}
