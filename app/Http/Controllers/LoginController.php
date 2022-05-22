<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJobs;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use NotificationChannels\Discord\Discord;

class LoginController extends Controller
{

    public function login(){
        return view('admin-panel.login');
    }

    public function loginSubmit(Request $request){
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);
        try {
            $user = User::where(['email' => $request->email, 'type' => "Admin"])->first();
            if($user){
                if(Hash::check($request->password, $user->password)){
                    Auth::login($user);
                    return redirect('/admin/dashboard')->with('success', 'Welcome');
                }
                else{
                    return redirect()->back()->with('error', 'Wrong email or password.');
                }
            }
            else{
                return redirect()->back()->with('error', 'Wrong email or password.');
            }
        } catch (Exception $ex) {
            Log::error($ex);
            return redirect()->route('admin.login')->with('error', 'Internal Server Error');
        }
    }

    public function logout(){
        if(auth()->user() && auth()->user()->type == "Admin"){
            Auth::logout();
            return redirect('/admin/login');
        }
    }


}
