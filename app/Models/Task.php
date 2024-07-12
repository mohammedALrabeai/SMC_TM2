<?php

namespace App\Models;

use App\Models\Emp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'title', 'description', 'sender_id', 'receiver_id', 'time_in_minutes', 'start_date',
        'is_recurring',
        'recurrence_interval_days',
        'next_occurrence',
    ];

    // Define relationships
    public function project()
    {


        return $this->belongsTo(Project::class);



    }

    public function user_project()
{
    return $this->belongsTo(Project::class,'project_id')->where('user_id', auth()->id());
}


public function task_emp()
{
    return $this->belongsTo(Emp::class,'sender_id')->where('user_id', auth()->id());
}
    public function sender()
    {
        return $this->belongsTo(Emp::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Emp::class, 'receiver_id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class);
    }

    public function followUps()
    {
        return $this->hasMany(TaskFollowUp::class);
    }

    public function lastFollowUp()
    {
        return $this->hasOne(TaskFollowUp::class)->latestOfMany();
    }

    public function projectOwner()
    {
        return $this->hasOneThrough(User::class, Project::class, 'id', 'id', 'project_id', 'user_id');
    }
}
