<?php

namespace App\Repositories;

use App\User;

class NoteRepository
{
    public function forUser(User $user)
    {
        return $user->notes()
            ->orderBy('created_at', 'desc')
            ->get();
    }
}