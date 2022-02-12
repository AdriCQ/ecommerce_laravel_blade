<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
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
      'email' => ['required', 'email'],
      'phone' => ['nullable', 'string'],
      'type' => ['required', 'in:CONTACTO,RASTREO,VENTAS'],
      // 'password' => ['required', 'string', 'confirmed'],
    ]);
    if ($validator->fails()) {
      $this->API_RESPONSE['ERRORS'] = $validator->errors();
      $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
    } else {
      $validator = $validator->validate();
      $validator['password'] = bcrypt('password');
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
    if ($id === 1)
      return response()->json(['El administrador no se puede eliminar'], 400, [], JSON_NUMERIC_CHECK);
    $user = User::query()->find($id);
    if (!$user->delete())
      return response()->json($user->errors, 503, [], JSON_NUMERIC_CHECK);
    return response()->json($user, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
  }
  /**
   * ListUsers
   * @return Illuminate\Http\JsonResponse
   */
  public function list()
  {
    $this->API_RESPONSE = User::all();
    return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
  }
  /**
   * Login
   * @param Request request
   * @return Illuminate\Http\JsonResponse
   */
  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      // 'email' => ['required', 'email'],
      'password' => ['required', 'string']
    ]);
    if ($validator->fails()) {
      $this->API_RESPONSE['ERRORS'] = $validator->errors();
      $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
    } else {
      $validator = $validator->validate();
      $user = User::query()->first();
      if (!Auth::attempt(['email' => $user->email, 'password' => $validator['password']]))
        return response()->json(['Credenciales incorrectas'], 401, [], JSON_NUMERIC_CHECK);
      $user = Auth::user();
      $this->API_RESPONSE['profile'] = $user;
      $this->API_RESPONSE['api_token'] = $user->createToken('auth-token')->plainTextToken;
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
      'email' => ['required', 'email'],
      'phone' => ['nullable'],
      'type' => ['required', 'in:CONTACTO,RASTREO,VENTAS'],
      // 'password' => ['required', 'string', 'confirmed'],
    ]);
    if ($validator->fails()) {
      $this->API_RESPONSE['ERRORS'] = $validator->errors();
      $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
    } else {
      $validator = $validator->validate();
      if ($id === 1)
        return response()->json(['El administrador no se puede eliminar'], 400, [], JSON_NUMERIC_CHECK);
      // $validator['password'] = bcrypt($validator['password']);
      User::query()->where('id', $id)->update($validator);
      $validator['id'] = $id;
      $this->API_RESPONSE = $validator;
    }
    return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
  }
  /**
   * Update Password
   * @param Request request
   * @return Illuminate\Http\JsonResponse
   */
  public function updatePassword(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'current_password' => ['required', 'string'],
      'password' => ['required', 'string', 'confirmed']
    ]);
    if ($validator->fails()) {
      $this->API_RESPONSE['ERRORS'] = $validator->errors();
      $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
    } else {
      $validator = $validator->validate();
      $user = User::query()->find(auth()->id());
      if (!Hash::check($validator['current_password'], $user->password))
        return response()->json(['Contraseña Incorrecta'], 400, [], JSON_NUMERIC_CHECK);
      $user->password = bcrypt($validator['password']);
      $user->tokens()->delete();
      if (!$user->save())
        $this->API_STATUS = 503;
    }
    return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
  }

  /**
   * contact
   * @param Request request
   * @return Illuminate\Http\JsonResponse
   */
  public function contact(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => ['required', 'email'],
      'subject' => ['required', 'string'],
      'message' => ['required', 'string'],
    ]);
    if ($validator->fails()) {
      $this->API_RESPONSE['ERRORS'] = $validator->errors();
      $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
    } else {
      $validator = $validator->validate();
      $contactUsers = User::query()->where('type', 'CONTACTO')->get();
      Notification::send(
        $contactUsers,
        new ContactNotification($validator['email'], $validator['subject'], $validator['message'])
      );
    }
    return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
  }
}
