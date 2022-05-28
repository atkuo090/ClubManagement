<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  private $table1='club_member_rosters';
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
    
      // protected $redirectTo = '/join';
    /** 
     * Create a new controller instance.
     *  $user_id=auth()->user()->user_id
     * @return void
     */
    public function __construct()
    {
      // $redirectTo = RouteServiceProvider::HOME;
      // dd($redirectTo);
        $this->middleware('guest')->except('logout');
    }



}
