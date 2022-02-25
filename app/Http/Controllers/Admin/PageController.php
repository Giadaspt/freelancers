<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function messages(){

        $messages = Message::all();

        return view('admin.users.messages', compact('messages'));
    }
}
