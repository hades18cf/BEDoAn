<?php

namespace App\Repositories\Profile;

use App\Repositories\BaseRepositoryInterface;

/**
 * Interface CustomerRepositoryInterface
 *
 * @package App\Repositories\User
 */
interface CustomerRepositoryInterface extends BaseRepositoryInterface
{
    public function getProfileById($user);
}
