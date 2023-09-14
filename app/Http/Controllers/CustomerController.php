<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Support\Facades\Auth;

class CustomerController extends BaseController
{
    /**
     * @var CustomerService
     */
    protected $customerService;


    /**
     * CustomerService constructor.
     *
     * @param CustomerService $CustomerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customerService->getCustomerById(Auth::id());
    }
}
