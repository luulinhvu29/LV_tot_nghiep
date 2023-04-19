<?php

namespace App\Repositories\Authority;

use App\Repositories\RepositoryInterface;

interface AuthorityRepositoryInterface extends RepositoryInterface
{
    public function getAuthorityByUserId($userId);

}
