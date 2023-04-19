<?php

namespace App\Services\Authority;
use App\Repositories\Authority\AuthorityRepositoryInterface;
use App\Services\BaseService;

class AuthorityService extends BaseService implements AuthorityServiceInterface
{
    public $repository;

    public function __construct(AuthorityRepositoryInterface $AuthorityRepository)
    {
        $this->repository = $AuthorityRepository;
    }

    public function getAuthorityByUserId($userId){
        return $this->repository->getAuthorityByUserId($userId);
    }

}
