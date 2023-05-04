<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'user_image',
        'age',
        'gender',
        'school_type',
        'school_year',
        'grade',
        'subject',
        'club',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
