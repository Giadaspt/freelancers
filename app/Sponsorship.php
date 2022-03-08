<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    public $timestamps = false;

    public function users(){
        return $this->belongsToMany('App\User','sponsorship_user', 'user_id', 'sponsorship_id')->withTimestamps();
    }


    protected $fillable = [
        'name',
        'price',
        'duration'
    ];

}