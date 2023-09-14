<?php

namespace App\Repositories\Profile;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class CustomẻRepository
 *
 * @package App\Repositories\User
 */
class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
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

    public function getProfileById($user)
    {
        return $this->model->where('id', $user)->first();
    }
}
