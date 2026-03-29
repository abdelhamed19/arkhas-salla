<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait
{

    public function paginatedData($collection)
    {
        return [
            'currentPage' => $collection->currentPage(),
            'lastPage' => $collection->lastPage(),
            'total' => $collection->total(),
            'nextPageUrl' => $collection->nextPageUrl(),
            'previousPageUrl' => $collection->previousPageUrl(),
            'links' => $collection->getUrlRange(1, $collection->lastPage())
        ];
    }

    public function successResponse($data)
    {
        return response()->json([
            'success' => true,
            'results' => $data,
        ], Response::HTTP_OK);
    }

    public function failResponse($message, $trace, $code = null)
    {
        return response()->json([
            'success' => false,
            'errors' => $message,
            'trace' => $trace
        ], $code ?? Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function unauthorizedResponse($message = null)
    {
        return response()->json([
            'success' => false,
            'errors' => $message ?? 'Unauthorized',
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function notFoundResponse($message = null)
    {
        return response()->json([
            'success' => false,
            'errors' => $message ?? 'Not Found',
        ], Response::HTTP_NOT_FOUND);
    }

    public function validationErrors($errors)
    {
        return response()->json([
            'success' => false,
            'errors' => $errors,
        ], Response::HTTP_BAD_REQUEST);
    }

}
