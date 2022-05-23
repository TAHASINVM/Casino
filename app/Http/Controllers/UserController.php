<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bet;

class UserController extends Controller
{

    function index(){
        $result=Bet::where('status',1)->get();
        return view('home',compact('result'));
    }

    function login(){
        if(session()->has('USER_LOGIN')){
            return redirect('/');
        }else{
            return view('login');
        }
    }

    function loginProcess(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email=$request->email;
        $password=$request->password;

        $result=User::where(['email'=>$email,'password'=>$password])->get();
        if(isset($result[0]->id)){
            $request->session()->put('USER_LOGIN',true);
            $request->session()->put('USER_ID',$result[0]->id);
            return redirect('/');
        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('login');
        }
    }
}
