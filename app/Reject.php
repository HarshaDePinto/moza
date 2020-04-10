<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reject extends Model
{
    protected $fillable = [
        'applicant_id', 'date', 'author', 'note'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
