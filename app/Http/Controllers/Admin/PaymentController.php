<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sponsorship;
use App\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay($user_id, $sponsor_id) {

        $user = User::find($user_id);
        $sponsor = Sponsorship::where('name', $sponsor_id)->first();
        return view('admin.users.riepilogoSponsor', compact('user', 'sponsor'));
    }

}
