<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class UserLoginController extends Controller
{

    use AuthenticatesUsers;

    protected $guard = 'user';
    protected $redirectTo = '/user/dashboard'; // Customize as needed

    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.user-login');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }
    
}
