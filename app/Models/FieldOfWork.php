<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldOfWork extends Model
{
    protected $table = 'fields_of_work';

    protected $fillable = ['name'];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_field_of_work');
    }
}