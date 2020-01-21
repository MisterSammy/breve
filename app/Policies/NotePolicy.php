<?php

namespace App\Policies;

use App\User;
use App\Note;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Note $note)
    {
        return $user->id === $note->user_id;
    }
}
