<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends BaseController
{
    /**
     * @var ProfileService
     */
    protected $profileService;


    /**
     * ProfileService constructor.
     *
     * @param ProfileService $profileService
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->profileService->getProfileById(Auth::id());
    }
}
