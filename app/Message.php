<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $fillable = [
        'name_sender',
        'email_sender',
        'text',
        
    ];


    public function users(){
        return $this->belongsTo('App\User');
    }
}
