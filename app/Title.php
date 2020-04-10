<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
        'name', 'category_id', 'author'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}
