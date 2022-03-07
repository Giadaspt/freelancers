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

        $categories = Category::where('name', 'like', '%'. $search . '%')
                    ->with('user_id')
                    ->first();

        // $categories = Category::where('name', 'like', '%'. $search . '%')
        //             ->orWhere('slug', 'like', '%'. $search . '%')
        //             ->with('user_id')
        //             ->first();

        // $users = User::table('users')
        //     ->join('categories', 'users.id', '=', 'categories.id')
        //     ->select('users.id', 'categories.id')
        //     ->where('categories.name', 'like', '%'. $search . '%')
        //     ->orWhere('categories.slug', 'like', '%'. $search . '%')
        //     ->get();

        return response()->json($categories);
    }
}
