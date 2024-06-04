<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthUserController extends Controller
{
    public function index()
    {
        $users = User::where('status','1')
           // ->whereNotIn('status',['3'])
            ->get();
        return $this->sendResponse(UserResource::collection($users),"User Get Successfully");
    }
    public function logins()
    {

        return $this->sendResponse([],"User Get Successfully");
    }

    public function update(Request $request):JsonResponse{
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'name' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $userId = auth()->user()->id;
        $inArr = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'update_by' => $userId,
            'update_date' => $this->getCurrentDateTime(),
        ];
        $category = User::find($request->input('id'));
        if ($category) {
            $category->update($inArr);
            return $this->sendResponse(new UserResource($category), "User Updated Successfully");
        } else {
            return $this->sendError('User not found.');
        }
    }

    public function delete(Request $request): JsonResponse {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $id = $input['id'];

        $userId = auth()->user()->id;
        $inArr = [
            'status' => '3',
            'update_by' => $userId,
            'update_date' => $this->getCurrentDateTime(),
        ];
        $rowData = User::find($id);
        if ($rowData) {
            $rowData->update($inArr);
            // $rowData->delete();
            return $this->sendResponse([], "User Deleted Successfully");
        } else {
            return $this->sendError("User Not Found", []);
        }
    }
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


}
