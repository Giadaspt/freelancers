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

        $categories = Category::all();
        $skills = Skill::all();

        return response()->json(compact('users', 'categories', 'skills'));
    }

    public function getCategoryUser($slug_category){
        
        $category = Category::where('slug', $slug_category)->with('users', 'users.skills')->first();

        $success = true;
        $error = "";

        if(!$category){
            $success = false;
            $error = 'categoria inesistente'; 
        } elseif($category && count($category['users']) === 0){
            $success = false;
            $error = 'Nessun utente appartiene a questa categoria';
        }

        return response()->json(compact('success', 'category', 'error'));
    }
}
