<?php

use App\Models\User;

if (!function_exists('showRole')) {
    function showRole($roldeId)
    {
        $roleName = '';
        switch ($roldeId) {
            case User::SUPER_ADMIN:
                $roleName = 'Super admin';
                break;
            case User::PROJECT_MANAGER:
                $roleName = 'Project manager';
                break;
            case User::DEVELOPER:
                $roleName = 'Developer';
                break;
            case User::TESTER:
                $roleName = 'Tester';
                break;
        }
        return $roleName;
    }
}
