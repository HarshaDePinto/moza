<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'author'
    ];

    public function titles()
    {
        return $this->hasMany(Title::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
