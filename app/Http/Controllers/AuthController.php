<?php

namespace App\Http\Controllers;

use App\Enums\MessageEnum;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login(LoginRequest $request)
    {
        $login = $this->authService->login($request);

        if (!$login['success']) {
            return $this->responseError($login['data'], MessageEnum::MSG_01);
        }

        return $this->responseSuccess($login['data'], MessageEnum::MSG_04);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return $this->responseSuccess([
            "message" => "Logged out successfully!"
        ]);
    }
}
