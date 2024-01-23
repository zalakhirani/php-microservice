<?php

namespace App\Http\Managers;

use Exception;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserManager{
    public function __construct(){}

     /**
     * @return array
     * @throws Exception
     */
    public function getAllUsers() : array
    {
        try {
            return array_values(config('UserArray'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * @param $userId
     * @return array
     * @throws NotFoundHttpException
     */
    public function getUserDetail($userId) : array|NotFoundHttpException
    {
        $userArray = config('UserArray');

        if ($userId && array_key_exists($userId, $userArray)) {
            return $userArray[$userId];
        }

        throw new NotFoundHttpException();
    }
}