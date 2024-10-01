<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function paginate($perPage)
    {
        return User::paginate($perPage);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        return $user->update($data);
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}
