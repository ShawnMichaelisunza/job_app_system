<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'job_details',
        'location',
        'job_description',
        'duties_response',
        'requirements'
    ];

    // for a relationship of database

    public function applicants(){
        return $this->hasMany(Applicant::class);
    }


}
