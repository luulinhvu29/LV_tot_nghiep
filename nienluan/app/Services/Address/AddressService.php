<?php

namespace App\Services\Address;
use App\Repositories\Address\AddressRepositoryInterface;
use App\Services\BaseService;

class AddressService extends BaseService implements AddressServiceInterface
{
    public $repository;

    public function __construct(AddressRepositoryInterface $AddressRepository)
    {
        $this->repository = $AddressRepository;
    }

    public function getAddressByUserId($userId){
        return $this->repository->getAddressByUserId($userId);
    }

}
