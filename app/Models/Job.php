<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    protected $fillable = ['job_detail_id', 'title', 'location', 'salary', 'status', 'is_active'];

    // Zorg ervoor dat we makkelijk kunnen filteren op actieve vacatures
    protected $casts = [
        'is_active' => 'boolean',
        'salary' => 'decimal:2',
    ];

    public function detail(): BelongsTo
    {
        return $this->belongsTo(JobDetail::class, 'job_detail_id');
    }
}