<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Review;
use App\Sponsorship;
use App\SponsorshipUser;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;

        $messages = Message::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        
        $lastMessage = $messages->first();
        
        $allMessages = $messages->count();

        $reviews = Review::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        
        $lastReview = $reviews->first();

        $allReviews = $reviews->count();

        $avgReviews=round(Review::avg('vote'),1);

        $sponsorships = Sponsorship::all();

        $allSponsorships = $sponsorships->count();
        
        return view('admin.home', compact('user', 'lastMessage', 'lastReview', 'allMessages', 'allReviews', 'avgReviews', 'allSponsorships'));

    }

}
