<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Profile\ProfileRepositoryInterface;

class AuthService
{
    /**
     *
     * @var ProfileRepositoryInterface
     */
    private $profileRepository;

    /**
     * UserService constructor.
     *
     * @param ProfileRepositoryInterface $profileRepository
     */
    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    /**
     * @param $request
     */
    public function login($request)
    {
        $credentials = $request->only(['email', 'password']);
        $user = $this->profileRepository->first(['email' => $credentials['email']]);

        if (!$user) {
            return [
                'success' => false,
                'data' => [
                    'fieldName' => 'email',
                ]
            ];
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return [
                'success' => false,
                'data' => [
                    'fieldName' => 'password',
                ]
            ];
        }

        $tokenResult = $user->createToken('Personal Access Token');

        return [
            'success' => true,
            'data' => [
                "user" => ($user),
                "access_token" => $tokenResult->accessToken ?? '',
                "token_type" => "Bearer",
                "expires_at" => Carbon::parse($tokenResult->expires_in ?? '')->toDateTimeString(),
            ]
        ];
    }
}
