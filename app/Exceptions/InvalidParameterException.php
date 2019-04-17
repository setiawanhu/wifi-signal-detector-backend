<?php

namespace App\Exceptions;

use Exception;

class InvalidParameterException extends Exception
{
    /**
     * Return invalid parameter response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function render()
    {
        return response()->json([
            'success' => false
        ]);
    }
}
