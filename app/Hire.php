<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    protected $fillable = [
        'applicant_id', 'vacancy_id', 'date', 'author', 'note'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
