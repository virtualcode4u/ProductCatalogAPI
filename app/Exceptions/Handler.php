<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        // Handle validation errors
        if ($exception instanceof ValidationException) {
            return response()->json([
                'error' => 'Validation Error',
                'message' => $exception->errors(),
            ], 422);
        }

        // Handle Model Not Found Exception
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource Not Found',
                'message' => 'The requested resource does not exist.',
            ], 404);
        }

        // Handle Route Not Found
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error' => 'Not Found',
                'message' => 'The requested endpoint does not exist.',
            ], 404);
        }

        // Handle Method Not Allowed
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'error' => 'Method Not Allowed',
                'message' => 'The HTTP method used is not allowed for this endpoint.',
            ], 405);
        }

        // Handle Unauthorized Access
        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'You need to log in to access this resource.',
            ], 401);
        }

        // Handle Too Many Requests (Rate Limiting)
        if ($exception instanceof ThrottleRequestsException) {
            return response()->json([
                'error' => 'Too Many Requests',
                'message' => 'You have exceeded the allowed number of requests. Try again later.',
            ], 429);
        }

        // Handle other unexpected errors
        return response()->json([
            'error' => 'Server Error',
            'message' => 'Something went wrong. Please try again later.',
        ], 500);
    }
}
