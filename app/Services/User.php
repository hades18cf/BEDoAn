<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;

class User
{
    /**
     *
     * @var UserRepositoryInterface
     */
    private $UserRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepositoryInterface $UserRepository
     */
    public function __construct(
        UserRepositoryInterface $UserRepository
    ) {
        $this->UserRepository = $UserRepository;
    }

    public function getUserById($request)
    {
        return $this->UserRepository->getUserById($request);
    }

    public function getUsers()
    {
        return $this->UserRepository->getUsers();
    }

    public function create($data)
    {
        return $this->UserRepository->createUser($data);
    }

    public function update($id, $data)
    {
        return $this->UserRepository->updateUser($id, $data);
    }
    public function detail($id)
    {
        return $this->UserRepository->detailUser($id);
    }
    public function delete($id)
    {
        return $this->UserRepository->deleteUser($id);
    }
}
