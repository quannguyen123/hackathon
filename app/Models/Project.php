<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'manager_id',
        'start_date',
        'end_date',
    ];

    public function manager()
    {
        return $this->belongsTo(\App\Models\User::class, 'manager_id', 'id');
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_member');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guides(): HasMany
    {
        return $this->hasMany(Guide::class)->orderBy('sort_no','ASC');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function guideMember()
    {
        $user = \Auth::user();
        $userId = ($user->id) ? $user->id : 0;
        return $this->belongsToMany(Guide::class, 'guide_member', 'project_id', 'guide_id')->withPivot(['status','description'])->where('user_id', $userId);
    }
}
