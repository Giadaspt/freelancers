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

        $users = User::with(['categories', 'skills'])->paginate(20);
        $categories = Category::all();
        $skills = Skill::all();
        return response()->json(compact('users', 'categories', 'skills'));
        
    }

    public function show($slug){
 
        $user = User::where('slug', $slug)->with(['categories', 'skills'])->first();

        // if(!$player){
        //     $player = ['cognome' => 'Calciatore non trovato', 'nome'=> ''];
        // }

        return response()->json($user);
    }

    public function getUsersByCategory($slug_cat){

        $category = Category::where('slug', $slug_cat)->with('users.skills')->first();
        $success = true;
        $error = '';
        if(!$category){
            $success = false;
            $error = 'Squadra inesistente';
        }elseif($category && count($category['users']) === 0){
            $success = false;
            $error = 'Non ci sono freelancer appartenenti a questa categoria';
        }
        
        return response()->json(compact('success','category', 'error'));
    }

    public function getUsersBySkills($slug_sk){

        $skill = Skill::where('slug', $slug_sk)->with('users.categories')->first();
        $success = true;
        $error = '';
        if(!$skill){
            $success = false;
            $error = 'Squadra inesistente';
        }elseif($skill && count($skill['users']) === 0){
            $success = false;
            $error = 'Non ci sono freelancers con questa skill';
        }
        
        return response()->json(compact('success','skill','error'));
    }
  
}

