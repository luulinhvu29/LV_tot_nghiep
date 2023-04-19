<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }

    public function getUserByUserId($userId)
    {
        return $this->model->where('id', $userId)->get();
    }
}