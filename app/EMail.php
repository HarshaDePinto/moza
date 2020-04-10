<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EMail extends Model
{
    protected $fillable = [
        'applicant_id', 'subject', 'body', 'author'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
