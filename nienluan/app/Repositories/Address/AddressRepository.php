<?php

namespace App\Repositories\Address;

use App\Models\Address;
use App\Repositories\BaseRepository;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{

    public function getModel()
    {
        return Address::class;
    }

    public function getAddressByUserId($userId){

        return $this->model->where('user_id', $userId)
            ->get();
    }

}
