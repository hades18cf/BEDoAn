<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Profile\ProfileRepository;
use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;


/**
 * RepositoryServiceProvider
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function register()
    {
        $repositories = [
            ProfileRepositoryInterface::class => ProfileRepository::class,
            CustomerRepositoryInterface::class => CustomerRepository::class,
            ProductRepositoryInterface::class => ProductRepository::class,
            UserRepositoryInterface::class => UserRepository::class,
        ];

        foreach ($repositories as $interface => $repository) {
            $this->app->singleton($interface, $repository);
        }
    }
}
