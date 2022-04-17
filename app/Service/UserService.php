<?php

namespace App\Service;
use App\Models\User;

class UserService
{
    public static function getUserByRole($roleId = []) {
        if (!empty($roleId)) {
            $project = User::whereIn('role_id', $roleId)->get();
        } else {
            $project = User::get();
        }
        return $project;
    }
}
