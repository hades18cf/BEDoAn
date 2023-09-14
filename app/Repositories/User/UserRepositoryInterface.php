<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepositoryInterface;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\User
 */
interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getUserById($request);
    public function getUsers();
    public function createUser($data);
    public function updateUser($id, $data);
    public function detailUser($id);
    public function deleteUser($id);
}
