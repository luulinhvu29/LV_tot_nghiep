<?php

namespace App\Repositories\Authority;

use App\Models\Authority;
use App\Repositories\BaseRepository;

class AuthorityRepository extends BaseRepository implements AuthorityRepositoryInterface
{

    public function getModel()
    {
        return Authority::class;
    }

    public function getAuthorityByUserId($userId){

        return $this->model->where('user_id', $userId)
            ->get();
    }

}
