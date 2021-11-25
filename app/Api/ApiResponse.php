<?php

namespace App\Api;

use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse extends Response
{
    public function success(string $message)
    {
        return response()->json([
            'isSuccess' => true,
            'message'   => '',
            'data'      => null
        ], self::HTTP_OK);
    }

    public function successWithData(string $message, string $data_key, $data = [])
    {
        return response()->json([
            'isSuccess' => true,
            'message'   => '',
            'data'      =>  [
                $data_key => $data
            ]
        ], self::HTTP_OK);
    }

    public function errorLog($e)
    {
        return Log::info([
            'error' =>  $e->getMessage(),
            'details' => $e->getTrace()[0]
        ]);
    }
}