<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobDetail extends Model
{
    protected $fillable = ['description', 'requirements', 'responsibilities', 'benefits'];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}