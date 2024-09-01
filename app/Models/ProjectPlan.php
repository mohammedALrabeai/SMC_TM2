<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'project_id',
        'name',
        'start_date',
        'end_date',
        'moderator_id',
        'copy_writer_id',
        'media_buyer_id',
        'graphic_designer_id',
        'video_designer_id',
        'programmer_id',
        'seo_specialist_id',
        'files_url',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    public function moderator()
    {
        return $this->belongsTo(Emp::class, 'moderator_id')->where('user_id', auth()->user()->user_id);
    }

    public function copyWriter()
    {
        return $this->belongsTo(Emp::class, 'copy_writer_id')->where('user_id', auth()->user()->user_id);
    }

    public function mediaBuyer()
    {
        return $this->belongsTo(Emp::class, 'media_buyer_id')->where('user_id', auth()->user()->user_id);
    }

    public function graphicDesigner()
    {
        return $this->belongsTo(Emp::class, 'graphic_designer_id')->where('user_id', auth()->user()->user_id);
    }

    public function videoDesigner()
    {
        return $this->belongsTo(Emp::class, 'video_designer_id')->where('user_id', auth()->user()->user_id);
    }

    public function programmer()
    {
        return $this->belongsTo(Emp::class, 'programmer_id')->where('user_id', auth()->user()->user_id);
    }

    public function seoSpecialist()
    {
        return $this->belongsTo(Emp::class, 'seo_specialist_id')->where('user_id', auth()->user()->user_id);
    }

    public function projectPlanDetails()
    {
        return $this->hasMany(ProjectPlanDetail::class);
    }

    public function emp_project()
    {

        $user=User::find(auth()->user()->user_id);
    // dd($user);
        return $this->belongsTo(Project::class,'project_id')->where('user_id', $user->id);
    }
}
