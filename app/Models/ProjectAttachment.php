<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'des', 'url', 'is_in_own_drive', 'emp_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function user_attach_app()
{
    return $this->belongsTo(Project::class, 'project_id');
}
public function attach_project()
{

    $user=Emp::find(auth()->guard('emp')->user()->user_id);
// dd($user);
    return $this->belongsTo(Project::class,'project_id')->where('user_id', $user->id);
}
public function emp()
{
    return $this->belongsTo(Emp::class, 'emp_id');
}
}
