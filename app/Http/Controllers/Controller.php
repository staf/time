<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param  mixed       $data
     * @param  string|null $message
     * @param  string      $status
     * @param  int         $code
     * @return JsonResponse
     */
    protected function jsonResponse($data = null, $message = null, $status = 'success', $code = 200)
    {
        return new JsonResponse([
            'code'    => $code,
            'data'    => $data,
            'message' => $message,
            'status'  => $status,
        ], $code);
    }

    /**
     * @param  string $message
     * @param  mixed  $data
     * @param  int    $code
     * @param  string $status
     * @return JsonResponse
     */
    protected function failJson($message, $data = null, $code = 400, $status = 'fail')
    {
        return $this->jsonResponse($data, $message, $status, $code);
    }

    /**
     * @param  string $message
     * @param  mixed  $data
     * @param  int    $code
     * @param  string $status
     * @return JsonResponse
     */
    protected function errorJson($message, $data = null, $code = 500, $status = 'error')
    {
        return $this->jsonResponse($data, $message, $status, $code);
    }
}
