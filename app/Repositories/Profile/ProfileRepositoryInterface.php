<?php

namespace App\Repositories\Profile;

use App\Repositories\BaseRepositoryInterface;

/**
 * Interface ProfileRepositoryInterface
 *
 * @package App\Repositories\User
 */
interface ProfileRepositoryInterface extends BaseRepositoryInterface
{
    public function getProfileById($user);
}
