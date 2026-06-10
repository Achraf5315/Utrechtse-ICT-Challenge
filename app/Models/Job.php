<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'salary',
        'status',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
