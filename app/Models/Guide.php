<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'guides';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'filename',
        'description',
        'project_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function guideMember()
    {
        $user = \Auth::user();
        $userId = ($user->id) ? $user->id : 0;
        return $this->belongsToMany(Project::class, 'guide_member', 'project_id', 'guide_id')->withPivot(['status','description'])->where('user_id', $userId);
    }
}
