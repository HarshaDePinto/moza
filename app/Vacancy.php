<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'category_id', 'title_id', 'company_id', 'number', 'time', 'salary', 'gender', 'start', 'end', 'des', 'edu', 'ben', 'author', 'regNumber', 'note'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class)->orderBy('time', 'asc');
    }

    public function hires()
    {
        return $this->hasMany(Hire::class);
    }
}
