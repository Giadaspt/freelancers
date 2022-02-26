<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function messages(Request $request){

        $messages = $request->all();

        $messageExists = true;

        $user_id = Auth::user()->id;

        $messages = Message::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

        if(count($messages) <= 0){
            $messageExists = false;
        }


        // if(!array_key_exists('user_id', $messages){

        //     $messageExists = false
        // });

        return view('admin.users.messages', compact('messages', 'user_id', 'messageExists'));
    }

    // public function messageExists(){
    //     $user_message = count($user_id == $message->user_id);

    //     if($user_id == $message->user_id){

    //     }
    // }

}
