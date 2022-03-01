<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorshipUser extends Model
{
    protected $fillable = [
        'sponsorship_id',
        'user_id',
        'created_at',
        'end_date',
    ];
}
