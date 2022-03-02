<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $user_id = Auth::user()->id;

        $messages = Message::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        
        $lastMessage = $messages->last();
        
        $allMessages = $messages->count();

        $reviews = Review::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        
        $lastReview = $reviews->last();

        $allReviews = $reviews->count();

        $avgReviews=round(Review::avg('vote'),1);
        
        return view('admin.home', compact('user', 'lastMessage', 'lastReview', 'allMessages', 'allReviews', 'avgReviews'));

    }

}
