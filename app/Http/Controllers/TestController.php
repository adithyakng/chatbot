<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Register;


class TestController extends Controller
{
    //
   public function ajaxRequestPost(Request $request)
   {

    $register = new Register();
    
    
    // // return response()->json(['success'=>'Got simple']);
    $result=json_decode($request->getContent(), true);
    // $query=Login::all('model')->where('Username',$result['name']);
    // print_r($query);

    $ans=Register::where('Username', $result['name'])
         ->pluck('Password')
         ->all();
    if(count($ans)==0)
    {
        return response()->json(['reply'=>'failure']);
    }
    else if($ans[0]== $result['password']){
        $request->session()->put('username', $result['name']);
        

        //return view("/hello");
        return response()->json(['reply'=>'success']);

    }
    else
    {
        return response()->json(['reply'=>'failure']);
    }
   }

   public function ajaxRequestGet()
   {
       return 'adithya';
   }
}
