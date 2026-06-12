<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class JobDetail extends Model
{
    protected $fillable = [
    'job_id',
    'description',
    'workplace',
    'requirements',
    'responsibilities',
    'benefits',
    'extra_information',
];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
