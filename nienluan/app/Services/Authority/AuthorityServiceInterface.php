<?php

namespace App\Services\Authority;

use App\Services\ServiceInterface;

interface AuthorityServiceInterface extends ServiceInterface
{
    public function getAuthorityByUserId($userId);
}
