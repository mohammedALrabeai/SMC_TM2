<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFollowUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id', 'task_id', 'task_status_id', 'note',
    ];

    // Define relationships
    public function emp()
    {
        return $this->belongsTo(Emp::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function taskStatus()
    {
        return $this->belongsTo(TaskStatus::class);
    }
    public function taskStatusForUser()
    {
        $user=User::find(auth()->user()->user_id);
        // dd($user);
            return $this->belongsTo(TaskStatus::class,'task_status_id')->where('user_id', $user->id);
    }
}
