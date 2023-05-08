<?php

namespace App\Repositories\Ward;

use App\Models\Wards;
use App\Repositories\BaseRepository;

class WardRepository extends BaseRepository implements WardRepositoryInterface
{

    public function getModel()
    {
        return Wards::class;
    }
}
