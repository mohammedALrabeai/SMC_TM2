<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPlanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_plan_id',
        'emp_id',
        'captions',
        'des',
        'hashtag',
        'type',
        'platform',
        'status',
    ];

    // Relationships
    public function projectPlan()
    {
        return $this->belongsTo(ProjectPlan::class);
    }

    public function emp()
    {
        return $this->belongsTo(Emp::class);
    }
}
