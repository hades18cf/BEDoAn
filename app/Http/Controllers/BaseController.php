<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public function responseSuccess($data, $message = '', $responseCode = Response::HTTP_OK, $statusCode = Response::HTTP_OK)
    {
        return response()->json([
            'status' => $responseCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public function responseError($data, $message = '', $responseCode = Response::HTTP_BAD_REQUEST, $statusCode = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status' => $responseCode,
            'message' => $message,
            'errors' => $data,
        ], $statusCode);
    }
}
