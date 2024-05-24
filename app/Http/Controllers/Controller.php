<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendResponse($result,$message){
        $responses = [
            'success'=> true,
            'data'   => $result,
            'message' => $message
        ];
        return response()->json($responses,200);
    }

    public function sendError($error,$errorMes=[],$code=404){
        $responses = [
            'success'=> false,
            'message' => $error
        ];
        if (!empty($errorMes)){
            $responses['data']=$errorMes;
        }
        return response()->json($responses,$code);
    }

    public function getCurrentDateTime(){

        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->toDateTimeString(); // e.g., "2024-05-24 14:55:23"
        return $formattedDateTime;
    }
}
