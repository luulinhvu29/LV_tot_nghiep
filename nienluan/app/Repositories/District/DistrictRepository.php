<?php

namespace App\Repositories\District;

use App\Models\Districts;
use App\Repositories\BaseRepository;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{

    public function getModel()
    {
        return Districts::class;
    }
}
