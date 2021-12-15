<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            $validator['password'] = bcrypt($validator['password']);
            $user = new User($validator);
            if ($user->save())
                $this->API_RESPONSE = $user;
            else {
                $this->API_RESPONSE = $user->errors;
                $this->API_STATUS = 503;
            }
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
    /**
     * Delete
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function delete(int $id)
    {
        $user = User::query()->find($id);
        if (!$user->delete())
            return response()->json($user->errors, 503, [], JSON_NUMERIC_CHECK);
        return response()->json($user, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Login
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            if (!Auth::attempt(['email' => $validator['email'], 'password' => $validator['password']]))
                return response()->json(['Credenciales incorrectas'], 401, [], JSON_NUMERIC_CHECK);
            $user = Auth::user();
            $user->tokens()->where('name', 'e-commerce')->delete();
            $this->API_RESPONSE['profile'] = $user;
            $this->API_RESPONSE['api_token'] = $user->createToken('e-commerce')->plainTextToken;
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
    /**
     * update
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function update(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            $validator['password'] = bcrypt($validator['password']);
            $user = User::query()->where('id', $id)->update($validator);
            $this->API_RESPONSE = $user;
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
}
