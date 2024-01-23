<?php

namespace App\Http\Controllers;

use App\Http\Managers\UserManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{

    /**
     * @var UserManager
     */
    public $userManager;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Get All Users
     *
     * @return JsonResponse
     */
    public function getAllUsers(): JsonResponse
    {
        $userList = $this->userManager->getAllUsers();

        return response()->json(['response' => 'Success', 'data' => $userList], 200);
    }

    /**
     * Get Single Users Detail
     *
     * @params Request $request
     * @params $userId
     * @return JsonResponse
     * @throws NotFoundHttpException
     */
    public function getUserDetail(Request $request, $userId): JsonResponse
    {
        $userDetail = $this->userManager->getUserDetail($userId);

        return response()->json(['response' => 'Success', 'data' => $userDetail], 200);
    }
}
