<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use Validator;
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

        $rules = [
            'name' => 'required', //Must be a number and length of value is 8
            'password' => 'required',
            'email'=>'required|email',
            'phone' => 'required|regex:/[0-9]{10}/'
        ];
        $validator = Validator::make($result, $rules);
        if($validator->fails()) 
            return response()->json($validator->messages(),200);

        $ans=Register::where('Username', $result['name'])
         ->pluck('Password')
         ->all();
         if(count($ans)!=0)
         {
             return response()->json(['reply'=>'present']);
         }
         else
         {
             $register->Username=$request->get('name');
             $register->Password=$request->get('password');
             $register->Email=$request->get('email');
             $register->Phonenumber=$request->get('phone');
             $register->save();
             return response()->json(['reply'=>'success']);
         }
    }
}
