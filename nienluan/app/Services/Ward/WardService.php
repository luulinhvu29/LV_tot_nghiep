<?php

namespace App\Services\Ward;
use App\Repositories\Ward\WardRepositoryInterface;
use App\Services\BaseService;

class WardService extends BaseService implements WardServiceInterface
{
    public $repository;

    public function __construct(WardRepositoryInterface $WardRepository)
    {
        $this->repository = $WardRepository;
    }

}
