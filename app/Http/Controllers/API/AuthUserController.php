<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TSController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthUserController extends Controller
{
    public function register(Request $request): JsonResponse{
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return $this->sendResponse($success, 'User Registration Completed');
    }

    public function login(Request $request):JsonResponse{

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return  $this->sendError('Validation Error.',$validator->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['user'] = $user;
            return $this->sendResponse($success, 'User Login Completed');
        } else {
            return $this->sendError('User Login Failed', ['error' => 'Unauthorised']);
        }

    }

    protected function sendError($error, $errorMessages = [], $code = 400): JsonResponse{
        $response = [
            'code' => $code,
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    protected function sendResponse($result, $message, $code = 200): JsonResponse{
        $response = [
            'code' => $code,
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

}
