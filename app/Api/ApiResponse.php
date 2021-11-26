<?php

namespace App\Api;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse extends Response
{
    public function success(string $message)
    {
        return response()->json([
            'isSuccess' => true,
            'message'   => $message,
            'data'      => null
        ], self::HTTP_OK);
    }

    public function error(string $error)
    {
        return response()->json([
            'isSuccess' => false,
            'error'     => $error,
            'data'      => null
        ], self::HTTP_BAD_REQUEST);
    }

    public function successWithData(string $message, string $data_key, $data = [])
    {
        return response()->json([
            'isSuccess' => true,
            'message'   => $message,
            'data'      =>  [
                $data_key => $data
            ]
        ], self::HTTP_OK);
    }

    public function errorLog($e)
    {
        return Log::info(
            [
                'error'   => $e->getMessage(),
                'trace'     => $e->getTrace()[0]
            ]
        );
    }

    //TokenBlacklistedException
       // JWTException
        //TokenInvalidException
        // TokenExpiredException
}