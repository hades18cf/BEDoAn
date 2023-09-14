<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class CustomẻRepository
 *
 * @package App\Repositories\Product
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * @var DatabaseManager
     */
    private $db;

    /**
     * ProfileRepository constructor.
     *
     * @param Product $model
     * @param DatabaseManager $db
     */
    public function __construct(Product $model, DatabaseManager $db)
    {
        parent::__construct($model);

        $this->db = $db;
    }

    public function getProductById($request)
    {
        return $this->model->where('name', $request->name)->get();
    }

    public function getProducts()
    {
        return $this->model->orderBy('id', 'DESC')->get();
    }
    public function createProduct($data)
    {
        return $this->model::create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }
    public function detailProduct($id)
    {
        return $this->model->where('id', $id)->first();
    }
    public function deleteProduct($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
