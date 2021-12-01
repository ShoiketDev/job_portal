<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function job(){
        return $this->belongsTo(JobType::class, 'job_types_id', 'id');
    }
}
