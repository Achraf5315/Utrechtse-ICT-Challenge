<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    protected $fillable = [
        'description',
        'requirements',
        'responsibilities',
        'benefits',
    ];

    public function job()
    {
        return $this->hasOne(Job::class);
    }
}
