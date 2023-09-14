<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepositoryInterface;

/**
 * Interface ProductRepositoryInterface
 *
 * @package App\Repositories\User
 */
interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getProductById($request);
    public function getProducts();
    public function createProduct($data);
    public function updateProduct($id, $data);
    public function detailProduct($id);
    public function deleteProduct($id);
}
