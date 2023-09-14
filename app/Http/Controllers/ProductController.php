<?php

namespace App\Http\Controllers;

use App\Services\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{
    /**
     * @var Product
     */
    protected $productService;


    /**
     * ProductService constructor.
     *
     * @param Product $productService
     */
    public function __construct(Product $productService)
    {
        $this->ProductService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->ProductService->getProductById($request);
    }

    public function getProducts()
    {
        return $this->ProductService->getProducts();
    }

    public function create(Request $request)
    {
        $dataCreate = $request->only([
            "name",
            "price",
            "like",
            "image",
        ]);
        return $this->ProductService->create($dataCreate);
    }

    public function update(Request $request)
    {
        $dataEdit = $request->only([
            "name",
            "price",
            "like",
            "image",
        ]);
        return $this->ProductService->update($request->id, $dataEdit);
    }
    public function detail(Request $request)
    {
        return $this->ProductService->detail($request->id);
    }
    public function delete(Request $request)
    {
        return $this->ProductService->delete($request->id);
    }
}
