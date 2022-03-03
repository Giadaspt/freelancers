<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Category;
use App\Skill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users =  User::all();

        return response()->json(compact('users'));
    }
}
