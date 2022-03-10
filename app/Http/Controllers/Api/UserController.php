<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Category;
use App\Skill;
use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users =  User::with('categories', 'skills', 'reviews')->get();
        $categories = Category::all();
        $skills = Skill::all();
   

        return response()->json(compact('users', 'categories', 'skills'));
    }

    public function show(){

        $user = User::with('categories', 'skills', 'reviews')->get();
        $categories = Category::all();
        $skills = Skill::all();
        $reviews = Review::all();
        // $reviews = Review::with('users')->first();

        if(!$user){
            return 'Nessun utente trovato';
        };

        return response()->json(compact('user', 'categories', 'skills','reviews'));

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

    
    public function getReview($slug){

        $reviews = Review::all();

        // $reviews = Review::where('user_id', $user_id)->get();
        // $user = User::where('user_id', $user->id)->get();

        // $user_id = $request->user['id'];

        $user = User::where('slug', $slug)->with('users.reviews')->first();

        return response()->json(compact($user));
    }
}
