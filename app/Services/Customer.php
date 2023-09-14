<?php

namespace App\Services;

use App\Repositories\Profile\CustomerRepositoryInterface;

class Customer
{
    /**
     *
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * CustomerService constructor.
     *
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepository = $customerRepository;
    }

    public function getCustomerById($id)
    {
        return $this->customerRepository->getCustomerById($id);
    }
}
