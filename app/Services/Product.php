<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;

class Product
{
    /**
     *
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductService constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function getProductById($request)
    {
        return $this->productRepository->getProductById($request);
    }

    public function getProducts()
    {
        return $this->productRepository->getProducts();
    }

    public function create($data)
    {
        return $this->productRepository->createProduct($data);
    }

    public function update($id, $data)
    {
        return $this->productRepository->updateProduct($id, $data);
    }
    public function detail($id)
    {
        return $this->productRepository->detailProduct($id);
    }
    public function delete($id)
    {
        return $this->productRepository->deleteProduct($id);
    }
}
