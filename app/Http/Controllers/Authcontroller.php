<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Authcontroller extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function login(){
        return view('auth.login');
    }

    public function signup(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|confirmed'
        ]);
          // user id
          $tapnameappend = "UIID";
          $getid = "738389399487575894949303020293747567585960070808726526132543856978099098463648596798098985634232232634875869679324263734854960708090965746352372829495890809097574523424326859709090807573524";
             $getrandid = substr(str_shuffle($getid), 0 , 7);
             $userid = $tapnameappend.$getrandid;
       $user = new User;
       $user->name = $request->input('username');
       $user->email = $request->input('email');
       $user->userid = $userid;
       $user->password = Hash::make($request->input('password'));
       $user->save();
       return redirect(route('register'))->with('success',"User Created Successfully");

    }
    public function signin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $checkuser = User::where('email', $request->input('email'))->first();
        if($checkuser){
            if(Hash::check($request->password, $checkuser->password)){
                if($checkuser->role_as == "0"){
                    $request->session()->put('user',$checkuser->userid);
                    return redirect(route('userdashboard'));
                }elseif($checkuser->role_as == "1"){
                    $request->session()->put('admin',$checkuser->userid);
                    return redirect(route('admindashboard'));
                }
            }else{
                return redirect(route('login'))->with('error',"Password does not match");
            }
        }else{
            return redirect(route('login'))->with('error',"email is invalid");
        }
    }
    public function logout(){
        if(Session::has('user')){
            Session::pull('user');
            return redirect(route('login'));
        }else if(Session::has('admin')){
            Session::pull('admin');
            return redirect(route('login'));
        }
    }
}
