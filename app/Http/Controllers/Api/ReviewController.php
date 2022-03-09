<?php

namespace App\Http\Controllers\Api;

use App\Review;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function store(Request $request){
        
        $request->validate($this->makeValidation(), $this->makeValidationMessage());

        $success = true;
        
        $new_review = new Review();
        $new_review->user_id = $request->user['id'];
        $new_review->author_name = $request->author_name;
        $new_review->vote = $request->vote;
        $new_review->text = $request->text;

        // $new_review->fill($data);
        $new_review->save();

        return response()->json(compact('success'));
    }

    
    private function makeValidation(){
        return [
            "author_name" => "required|max:50|min:2",
            "vote" => "required",
            "text" => "max:255|min:2",
        ];
    }

    private function makeValidationMessage(){
        return [
            "author_name.required" =>"Il nome è obbligatorio",
            "author_name.max" =>"Il nome può avere massimo 50 caratteri",
            "author_name.min" =>"Il nome deve avere minimo 2 caratteri",
            "vote.required" =>"il voto è obbligatoria",
            "email_sender.max" =>"Il nome può avere massimo 150 caratteri",
            "email_sender.min" =>"Il nome deve avere minimo 2 caratteri",
            "text.max" =>"Il messaggio può avere massimo 255 caratteri",
            "text.min" =>"Il messaggio deve avere minimo 2 caratteri",
           
        ];
    }

}
