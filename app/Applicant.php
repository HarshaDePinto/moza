<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Ui\Presets\React;

class Applicant extends Model
{
    protected $fillable = [
        'title_id', 'image', 'cv', 'name', 'profile', 'country', 'email', 'tel', 'experience', 'c_job', 'c_company', 'c_jd', 'education', 'technical', 'history', 'cl', 'ot', 'category_id', 'author', 'status', 'regNumber', 'eduLevel'
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class)->orderBy('time', 'asc');
    }

    public function mails()
    {
        return $this->hasMany(EMail::class)->orderBy('updated_at', 'desc');
    }

    public function hires()
    {
        return $this->hasMany(Hire::class);
    }

    public function rejects()
    {
        return $this->hasMany(Reject::class);
    }
}
