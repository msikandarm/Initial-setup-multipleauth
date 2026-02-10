<?php

namespace App\Helpers;

class ResponseHelper
{
    public function success(array|string $data, int $statusCode = 200, array $headers = [])
    {
        return response()->json([
            'success' => true,
            'statusCode' => $statusCode,
            'data' => $data,
        ], $statusCode, $headers);
    }

    public function error(array|string $data, int $statusCode = 404, array $headers = [])
    {
        return response()->json([
            'success' => false,
            'statusCode' => $statusCode,
            'data' => $data,
        ], $statusCode, $headers);
    }
}
