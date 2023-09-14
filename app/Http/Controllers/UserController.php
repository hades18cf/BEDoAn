<?php

namespace App\Http\Controllers;

use App\Services\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * @var User
     */
    protected $userService;


    /**
     * UserService constructor.
     *
     * @param User $userService
     */
    public function __construct(User $userService)
    {
        $this->UserService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->UserService->getUserById($request);
    }

    public function getUsers()
    {
        return $this->UserService->getUsers();
    }

    public function create(Request $request)
    {
        $dataCreate = $request->only([
            "name",
            "email",
            "password",
            "phone_number",
            "role"
        ]);
        return $this->UserService->create($dataCreate);
    }

    public function update(Request $request)
    {
        $dataEdit = $request->only([
            "name",
            "email",
            "password",
            "phone_number",
            "role",
        ]);
        return $this->UserService->update($request->id, $dataEdit);
    }
    public function detail(Request $request)
    {
        return $this->UserService->detail($request->id);
    }
    public function delete(Request $request)
    {
        return $this->UserService->delete($request->id);
    }
}
