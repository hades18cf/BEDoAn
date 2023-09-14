<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Relations
     *
     * @param $query
     * @param $relations
     *
     * @return mixed
     */
    private function relations($query, $relations)
    {
        return $query->with($relations);
    }

    /**
     * Builder conditions
     *
     * @param array $conditions
     * @param array $relations
     *
     * @return mixed
     */
    public function conditions(array $conditions, array $relations = [])
    {
        $query = $this->model->where($conditions);
        if ($relations) {
            $query = $this->relations($query, $relations);
        }

        return $query->orderBy('id', 'asc');
    }

    /**
     * Exists item
     *
     * @param array $conditions
     *
     * @return mixed
     */
    public function exists(array $conditions)
    {
        return $this->conditions($conditions)->exists();
    }

    /**
     * Get paginate
     *
     * @param array $conditions
     * @param array $relations
     *
     * @return mixed
     */
    public function index(array $conditions, array $relations = [])
    {
        return $this->conditions($conditions, $relations);
    }

    /**
     * Get first
     *
     * @param array $conditions
     * @param array $relations
     *
     * @return mixed
     */
    public function first(array $conditions, array $relations = [])
    {
        return $this->conditions($conditions, $relations)->first();
    }

    /**
     * Store item
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function store(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update item
     *
     * @param array $conditions
     * @param array $attributes
     *
     * @return mixed
     */
    public function update(array $conditions, array $attributes)
    {
        return $this->conditions($conditions)->update($attributes);
    }

    /**
     * Delete item
     *
     * @param array $conditions
     *
     * @return mixed
     */
    public function destroy(array $conditions)
    {
        return $this->conditions($conditions)->delete();
    }

    /**
     * @param array $conditions
     * @param array $attributes
     * @return mixed
     */
    public function updateOrCreate(array $conditions, array $attributes = [])
    {
        return $this->model->updateOrCreate($conditions, $attributes);
    }

    /**
     * Insert new records into the database.
     *
     * @param array $attributes
     * @return bool
     */
    public function insert(array $attributes): bool
    {
        return $this->model->query()->insert($attributes);
    }

    /**
     * @param array $conditions
     * @param array $attributes
     * @return mixed
     */
    public function get(array $conditions = [], array $attributes = [])
    {
        return $this->conditions($conditions)->orderBy('id', 'asc')->get($attributes);
    }
}
