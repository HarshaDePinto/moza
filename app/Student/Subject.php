<?php

namespace App\Student;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'author', 'des', 'level_id'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
