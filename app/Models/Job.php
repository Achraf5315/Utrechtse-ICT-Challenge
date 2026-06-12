<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    protected $fillable = [
        'job_detail_id',
        'title',
        'location',
        'salary',
        'status',
        'is_active',
        'province_id',
        'education_level_id',
    ];

    public function getShortDescriptionAttribute()
    {
        return Str::limit(
            $this->detail?->description,
            200
        );
    }

    public function detail()
    {
        return $this->belongsTo(JobDetail::class, 'job_detail_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function fieldsOfWork()
    {
        return $this->belongsToMany(FieldOfWork::class, 'job_field_of_work');
    }
}