<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{
    const SUPER_ADMIN = 1;
    const PROJECT_MANAGER = 2;
    const DEVELOPER = 3;
    const TESTER = 4;

    use HasApiTokens, HasFactory, Notifiable, SearchableTrait;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_member');

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'name' => 5,
            'email' => 10,
        ],
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
