<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'reg', 'web', 'location', 'contact_person_name', 'contact_person_position', 'contact_person_email', 'contact_person_tel', 'author', 'note', 'regNumber'
    ];

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class)->orderBy('end', 'asc');
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class)->orderBy('time', 'asc');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function hasCategories($catId)
    {
        return in_array($catId, $this->categories->pluck('id')->toArray());
    }
}
