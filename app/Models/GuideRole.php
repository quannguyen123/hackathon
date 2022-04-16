<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideRole extends Model
{
    use HasFactory;

    protected $table = 'guide_roles';

    protected $fillable = [
        'guide_id',
        'role_id'
    ];
}
