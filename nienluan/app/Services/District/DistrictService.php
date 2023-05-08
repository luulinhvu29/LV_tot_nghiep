<?php

namespace App\Services\District;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Services\BaseService;

class DistrictService extends BaseService implements DistrictServiceInterface
{
    public $repository;

    public function __construct(DistrictRepositoryInterface $DistrictRepository)
    {
        $this->repository = $DistrictRepository;
    }

}
