<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Category;
use App\Skill;
use App\Http\Controllers\Controller;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        $users =  User::with(['sponsorships', 'categories', 'skills'])->get();

        $selected_sponsored = [];
        $c = 0;
        $maxSponsored = 3;
 

           foreach ($users as $user){
                if(count($user->sponsorships) > 0 && $c < $maxSponsored ){
                    $selected_sponsored[] = $user;
                    $c = $c + 1;
                }
                  
             }
        
       

        $categories = Category::all();
        $skills = Skill::all();

        return response()->json(compact('users', 'categories', 'skills', 'selected_sponsored'));
    }

    public function show(){

        $user = User::all();
        $categories = Category::all();
        $skills = Skill::all();

        if(!$user){
            return 'Nessun utente trovato';
        };

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

        $category = Category::where('name', 'like', '%'. $search . '%')
                    ->with('user_id')
                    ->first();


        return response()->json($category);
    }
}
