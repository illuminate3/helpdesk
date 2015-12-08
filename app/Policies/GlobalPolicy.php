<?php

namespace App\Policies;

use App\Models\User;

class GlobalPolicy extends Policy
{
    /**
     * Returns true / false if the specified user has access to the backend.
     *
     * @param User $user
     *
     * @return bool
     */
    public function backend(User $user)
    {
        if ($user->is($this->admin()->name)) {
            return true;
        }

        return false;
    }
}