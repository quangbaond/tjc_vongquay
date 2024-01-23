<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ApiController extends Controller
{
    /**
     * @param $data
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function sendSuccess($data, string $message = 'Success', int $code = Response::HTTP_OK): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
