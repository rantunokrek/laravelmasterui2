<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
 
    // password change
    public function passChange()
    {
        return view('passwordChange');
    }
      // password Update
    public function passUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|max:16|string|confirmed',
            'password_confirmation' => 'required',
          
        ]);
        $user=Auth::user();
        if (Hash::check($request->current_password, $user->password)) {
           // way 1
       // $user->password=Hash::make($request->password); //hashing password
       // $user->save();
       // way 2
       $data=array(
         'password' => Hash::make($request->password),
       );
       DB::table('users')->where('id',Auth::id())->update($data);

         return redirect()->back()->with('success', 'Password Changed successfully!');
          
        }else{
         return redirect()->back()->with('error', 'Current password not matched!');
        }
       
    }
    

    //deposite money
 public function deposite()
    {
        return view('deposite');
    }
    //resen mail m
 public function resend()
    {
      
    }
    //user details
public function userDetail($id)
    {
     $id =  Crypt::decryptString($id);
      echo $id;
      //DB::table('users')->where('id', $id)->first();
    }


public function passHashing(Request $anyname){
    $pass = Hash::make($anyname->password);
    echo $pass;
}



}
