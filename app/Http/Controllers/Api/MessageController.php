<?php

namespace App\Http\Controllers\Api;

use App\Message;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function store(Request $request){
        
        $request->validate($this->makeValidation(), $this->makeValidationMessage());

        $success = true;
        
        $new_message = new Message();
        $new_message->user_id = $request->user['id'];
        $new_message->name_sender = $request->name_sender;
        $new_message->email_sender = $request->email_sender;
        $new_message->text = $request->text;

        // $new_message->fill($data);
        $new_message->save();

        return response()->json(compact('success'));
    }

    
    private function makeValidation(){
        return [
            "name_sender" => "required|max:50|min:2",
            "email_sender" => "required|max:150|min:2",
            "text" => "required|max:255|min:2",
        ];
    }

    private function makeValidationMessage(){
        return [
            "name_sender.required" =>"Il nome è obbligatorio",
            "name_sender.max" =>"Il nome può avere massimo 50 caratteri",
            "name_sender.min" =>"Il nome deve avere minimo 2 caratteri",
            "email_sender.required" =>"L'email è obbligatoria",
            "email_sender.max" =>"Il nome può avere massimo 150 caratteri",
            "email_sender.min" =>"Il nome deve avere minimo 2 caratteri",
            "text.required" =>"Il messaggio è obbligatoria",
            "text.max" =>"Il messaggio può avere massimo 255 caratteri",
            "text.min" =>"Il messaggio deve avere minimo 2 caratteri",
           
        ];
    }

}
