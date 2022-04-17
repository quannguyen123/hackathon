<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideMember extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    protected $table = 'guide_member';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'guide_id',
        'project_id',
        'user_id',
        'status',
        'description'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean'
    ];
}
