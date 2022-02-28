<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'lastname',
        'address',
        'city',
        'description_job',
        'image',
        'cv',
        'email', 
        'password',
        'slug', 
        'category_id',
        'skill_id',
        // 'sponsorship_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    public function reviews(){
        return $this->hasMany('App\Review');
    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
    public function skills(){
        return $this->belongsToMany('App\Skill');
    }
    public function sponsorships(){
        return $this->belongsToMany('App\Sponsorship');
    }

    public static function generateSlug($name){

        $slug = Str::slug($name);
        $slug_base = $slug;
    
        $name_presente = User::where('slug', $slug)->first();
    
        $c = 1;
        while($name_presente){
          $slug = $slug_base . '-' . $c;
          $c++;
          $name_presente = User::where('slug', $slug)->first();
        }
    
        return $slug;
    }

}
