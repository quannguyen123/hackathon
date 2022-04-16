<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guides extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var mixed
     */
    protected $table = 'guides';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'filename',
        'project_id',
        'description',
        'sort_no'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, GuideRole::class, 'guide_id', 'role_id');
    }
}
