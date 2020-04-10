<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'applicant_id', 'time', 'vacancy_id', 'regNumber', 'date', 'location', 'contact_person', 'author', 'note'
    ];

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
