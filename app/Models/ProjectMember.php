<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    use HasFactory;
    
    protected $table = 'project_member';

    protected $fillable = [
        'project_id',
        'user_id',
    ];
}
