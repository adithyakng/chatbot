<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
class RegisterController extends Controller
{
    public function create()
    {
        return view('login_add');
    }
    public function store(Request $request)
    {
        $register = new Register();
        // $login->Username = $request->get('username');
        // $login->model = $request->get('password');    
        // $login->save();
        $result=json_decode($request->getContent(), true);
        $ans=Register::where('Username', $result['name'])
         ->pluck('Password')
         ->all();
         if(count($ans)!=0)
         {
             return "present";
         }
         else
         {
             $register->Username=$request->get('name');
             $register->Password=$request->get('password');
             $register->Email=$request->get('email');
             $register->Phonenumber=$request->get('phone');
             $register->save();
             return "Successfully Registered";
         }
    }
}
