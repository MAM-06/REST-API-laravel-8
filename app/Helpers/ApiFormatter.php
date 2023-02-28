<?php

namespace App\Helpers;

class ApiFormatter // Format API Response
{
    protected static $response = [ //response
        'code' => null, //200, 400, 404
        'message' => null, //success, error, not found
        'data' => null, 
    ];

    public static function createApi($code = null, $message = null, $data = null)
    {
        self::$response['code'] = $code; 
        self::$response['message'] = $message; 
        self::$response['data'] = $data; //data yang dikirimkan

        return response()->json(self::$response,self::$response['code']); //mengembalikan response dalam bentuk json
    }
}