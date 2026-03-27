<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait
{
    public function successResponse($data)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], Response::HTTP_OK);
    }
    public function failResponse($message, $code = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code ?? Response::HTTP_BAD_REQUEST);
    }
    public function unauthorizedResponse($message = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message ?? 'Unauthorized',
        ], Response::HTTP_UNAUTHORIZED);
    }
    public function notFoundResponse($message = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message ?? 'Not Found',
        ], Response::HTTP_NOT_FOUND);
    }
}
