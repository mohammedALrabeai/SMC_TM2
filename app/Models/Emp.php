<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'phone', 'number_of_hours_per_day', 'day_off',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function sentTasks()
    {
        return $this->hasMany(Task::class, 'sender_emp_id');
    }

    public function receivedTasks()
    {
        return $this->hasMany(Task::class, 'receiver_emp_id');
    }
}
