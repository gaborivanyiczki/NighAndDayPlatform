<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Cart;

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
    }

    public function login(Request $request)
    {
        $credentials = $this->credentials($request);
        $remember = $request->has('remember') ? true : false;
        $items = null;

        if(!\Cart::isEmpty())
        {
            $items = \Cart::getContent()->toArray();
        }

        if (Auth::attempt($credentials, $remember)) {
            if($items != null)
            {
                $userId = Auth::id();
                foreach($items as $item)
                {
                    \Cart::session($userId)->add($item);
                }
            }
            return $this->authenticated($request);
        }else{
            return $this->sendFailedLoginResponse($request, 'auth.failed_status');
        }
    }

    public function authenticated(Request $request)
    {
        return redirect()->intended($this->redirectTo);
    }

    private function credentials(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials = array_merge($credentials, ['active' => 1]);

        return $credentials;
    }

}
