<?php

namespace App\Repositories\City;

use App\Models\Cities;
use App\Repositories\BaseRepository;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{

    public function getModel()
    {
        return Cities::class;
    }
}
