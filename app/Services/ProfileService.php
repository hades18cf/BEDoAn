<?php

namespace App\Services;

use App\Repositories\Profile\ProfileRepositoryInterface;

class ProfileService
{
    /**
     *
     * @var ProfileRepositoryInterface
     */
    private $profileRepository;

    /**
     * ProfileService constructor.
     *
     * @param ProfileRepositoryInterface $profileRepository
     */
    public function __construct(
        ProfileRepositoryInterface $profileRepository
    ) {
        $this->profileRepository = $profileRepository;
    }

    public function getProfileById($id)
    {
        return $this->profileRepository->getProfileById($id);
    }
}
