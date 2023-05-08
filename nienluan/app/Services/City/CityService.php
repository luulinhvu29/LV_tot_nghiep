<?php

namespace App\Services\City;
use App\Repositories\City\CityRepositoryInterface;
use App\Services\BaseService;

class CityService extends BaseService implements CityServiceInterface
{
    public $repository;

    public function __construct(CityRepositoryInterface $CityRepository)
    {
        $this->repository = $CityRepository;
    }

}
