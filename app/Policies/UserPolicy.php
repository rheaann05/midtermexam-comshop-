<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine if the given user can manage (edit/delete) the target user.
     */
    public function manage(User $currentUser, User $targetUser): bool
    {
        // 1. Admins can manage anyone
        if ($currentUser->hasRole('admin')) {
            return true;
        }

        // 2. Owners can ONLY manage users who have the 'employee' role
        if ($currentUser->hasRole('owner') && $targetUser->hasRole('employee')) {
            return true;
        }

        // 3. Employees cannot manage anyone (and Owners can't manage Admins/other Owners)
        return false;
    }
}