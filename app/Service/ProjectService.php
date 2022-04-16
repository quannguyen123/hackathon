<?php

namespace App\Service;
use App\Models\User;

class ProjectService
{
    public function getUserByRole($roleId) {
        $project = User::where('role_id', $roleId)->get();
        return $project;
    }
}
