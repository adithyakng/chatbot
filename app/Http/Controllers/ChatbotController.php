<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chatbot;
use App\History;
class ChatbotController extends Controller
{
    public function chatbotRequestPost(Request $request)
   {
    //$this->info("adithya");
    $input=strtolower($request['input']);
    if($input=="bye")
    {
        $request->session()->forget('username');
        return "logout";
    }
    $Chatbot = new Chatbot();
    $ans=Chatbot::where('keyword', $input)
         ->pluck('value')
         ->all();
    
    if(count($ans)==0)
        return "I can't Understand";
    else
    {
        $min=0;
        $max=count($ans[0])-1;
        if($request->session()->has('username')){
        $username=$request->session()->get('username');
        
        $response=$ans[0][rand($min,$max)];
        $chathist=new History();
        $chathist->Username=$username;
        $chathist->bot=$response;
        $chathist->user=$input;
        $chathist->save();
        }

        // History::where('Username','=',$username)
        // ->push('bot',array($response));
        //$this->info($ans[0][rand($min,$max)]);
        return $ans[0][rand($min,$max)];


        // Add here to history
        //$chathist = new ChatbotHistory();
        // $login->Username = $request->get('username');
        // $login->model = $request->get('password');    
        // $login->save();
        
         

     }
   }

   public function chatbotRequestGet()
   {
       return 'adithya';
   }

   public function chatbotHistoryRequestPost(Request $request)
   {
    if($request->session()->has('username')){
    $username=$request->session()->get('username');
    $bot_hist=History::where('Username', $username)
    ->pluck('bot')
    ->all();
    $user_hist=History::where('Username',$username)
    ->pluck('user')
    ->all();
    
      return response()->json(['bot'=>$bot_hist,'user'=>$user_hist]); 
    }
    else    
      return "";
   }
   
}
