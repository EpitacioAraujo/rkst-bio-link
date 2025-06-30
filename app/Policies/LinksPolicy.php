<?php

namespace App\Policies;

use App\Models\Links;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LinksPolicy
{
    public function interact(User $user, Links $links)
    {
        return $user->id === $links->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
