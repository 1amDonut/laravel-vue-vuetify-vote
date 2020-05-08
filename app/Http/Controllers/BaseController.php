<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * success Response method
     * @return \Illuminate\http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
    /**
     * error Response method
     * @return \Illuminate\http\Response
     */
    public function sendError($error, $errormessage = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error
        ];
        if (!empty($errormessage)) {
            $response['data'] = $errormessage;
        }
        return $response()->json($response, $code);
    }
}
