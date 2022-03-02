<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sponsorship;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay($user_id, $sponsor_id) {

        $userId= User::find($user_id);
        $user = Auth::user();
        $sponsor = Sponsorship::where('name', $sponsor_id)->first();
        return view('admin.users.riepilogoSponsor', compact('user', 'sponsor', 'userId'));
    }

}
