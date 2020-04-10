<?php

namespace App\Student;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'name', 'author', 'des'
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
