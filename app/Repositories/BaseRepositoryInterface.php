<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
interface BaseRepositoryInterface
{
    public function conditions(array $conditions, array $relations = []);

    public function exists(array $conditions);

    public function index(array $conditions, array $relations = []);

    public function first(array $conditions, array $relations = []);

    public function store(array $attributes);

    public function update(array $conditions, array $attributes);

    public function destroy(array $conditions);

    public function updateOrCreate(array $conditions, array $attributes = []);

    public function get(array $conditions = [], array $attributes = []);
}
