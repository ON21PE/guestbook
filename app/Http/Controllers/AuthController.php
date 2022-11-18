<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");
        
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success', 'Erfolgreich registriert');
        }else{
            return back()->with('fail', 'Etwas ist schiefgegangen...');
        }
    }
    

    public function loginUser(Request $request){
        $request->validate([

            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('guestbook');
            }else{
            return back()->with('fail', 'Das Passwort stimmt nicht');
        }
        }
        else{
            return back()->with('fail', 'Die Mailadresse wurde nicht gefunden');
        }
    }
    
    public function guestbook(){
        return view('guestbook');
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
} 
