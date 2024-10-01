<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsersWithPagination($perPage)
    {
        return $this->userRepository->paginate($perPage);
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function updateUser(User $user, array $data)
    {
        return $this->userRepository->update($user, $data);
    }

    public function deleteUser(User $user)
    {
        return $this->userRepository->delete($user);
    }
}
