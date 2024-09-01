<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'emp_id',
        'name',
        'campaign_type',
        'platform',
        'daily_spend',
        'landing_page_url',
        'sheet_url',
        'area',
        'location_url',
        'creatives_url',
        'asset_id',
        'start_date',
        'end_date',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function emp()
    {
        return $this->belongsTo(Emp::class);
    }
    public function emp_project()
    {

        $user=User::find(auth()->user()->user_id);
    // dd($user);
        return $this->belongsTo(Project::class,'project_id')->where('user_id', $user->id);
    }
    public function task_emp_app()
{
    return $this->belongsTo(Emp::class,'sender_id')->where('user_id', auth()->user()->user_id);
}
}
