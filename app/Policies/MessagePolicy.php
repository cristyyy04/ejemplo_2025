<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Message;

class MessagePolicy
{
    /**
     * Siempre devolver true → todos los usuarios pueden hacer cualquier acción.
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    public function view(?User $user, Message $message)
    {
        return true;
    }

    public function create(?User $user)
    {
        return true;
    }

    public function update(?User $user, Message $message)
    {
        return true;
    }

    public function delete(?User $user, Message $message)
    {
        return true;
    }
}
