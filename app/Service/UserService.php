<?php

namespace App\Service;
use App\Models\User;

class UserService
{
    public static function getUserByRole($roleId = null) {
        if (!empty($roleId)) {
            $project = User::where('role_id', $roleId)->get();
        } else {
            $project = User::get();
        }
        return $project;
    }
}
