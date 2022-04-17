<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory;
    
    protected $table = 'issues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'filename',
        'project_id',
        'private'
    ];
    
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    
    public function project() 
    {
		return $this->belongsTo(\App\Models\Project::class);
    }
}
