<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $fillable = [
        'user_id', 'in', 'out'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
