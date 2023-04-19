<?php

namespace App\Services\Address;

use App\Services\ServiceInterface;

interface AddressServiceInterface extends ServiceInterface
{
    public function getAddressByUserId($userId);
}
