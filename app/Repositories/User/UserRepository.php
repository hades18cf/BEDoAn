<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class CustomẻRepository
 *
 * @package App\Repositories\User
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    protected $model;

    /**
     * @var DatabaseManager
     */
    private $db;

    /**
     * ProfileRepository constructor.
     *
     * @param User $model
     * @param DatabaseManager $db
     */
    public function __construct(User $model, DatabaseManager $db)
    {
        parent::__construct($model);

        $this->db = $db;
    }

    public function getUserById($request)
    {
        return $this->model->where('id', $request->id)->get();
    }

    public function getUsers()
    {
        return $this->model->orderBy('id', 'DESC')->get();
    }
    public function createUser($data)
    {
        return $this->model::create($data);
    }
    public function updateUser($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }
    public function detailUser($id)
    {
        return $this->model->where('id', $id)->first();
    }
    public function deleteUser($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
