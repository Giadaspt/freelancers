<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function reviews(Request $request){

        $reviews = $request->all();

        $reviewExists = true;

        $user_id = Auth::user()->id;
        $user = Auth::user();

        $reviews = Review::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

        if(count($reviews) <= 0){
            $reviewExists = false;
        }


        return view('admin.users.reviews', compact('reviews', 'user_id', 'reviewExists','user'));
    }
}
