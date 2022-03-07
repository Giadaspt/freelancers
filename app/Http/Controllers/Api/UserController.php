<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Category;
use App\Skill;
use App\Http\Controllers\Controller;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users =  User::all();

        $categories = Category::all();
        $skills = Skill::all();

        return response()->json(compact('users', 'categories', 'skills'));
    }

    public function show(){

        $user = User::all();

        if(!$user){
            return 'Nessun utente trovato';
        }

        return response()->json($user);

    }

    public function getCategoryUser($name_category){
        
        $category = Category::where('name', $name_category)->with('users')->first();

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

    public function searchCategory(Request $request){

        $search = $request->get('query');

        $category = Category::where('name', 'like', '%'. $search . '%')
                    ->with('user_id')
                    ->first();


        return response()->json($category);
    }
}
