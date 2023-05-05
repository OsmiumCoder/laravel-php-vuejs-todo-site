<?php

namespace App\Repositories;

use App\Models\User;

class TodoRepository
{
    public function getTodosForUser(User $user)
    {
        return $user->todos;
    }
}
