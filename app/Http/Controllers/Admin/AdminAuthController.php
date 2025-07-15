<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class AdminAuthController extends Controller
{
    //
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    //    dd(\DB::connection()->getDatabaseName());

        if(Auth::attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = Auth::user();
            if($user->role == '1'){
                return redirect()->route('adminDashboard')->with('success','You are Logged in sucessfully.');
            }
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }

    public function adminLogout(Request $request)
    {
        Auth::logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }
}
