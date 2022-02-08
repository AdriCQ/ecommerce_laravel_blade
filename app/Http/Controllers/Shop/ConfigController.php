<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
  /**
   * Get Config
   * @param Request request
   * @return Illuminate\Http\JsonResponse
   */
  public function get()
  {
    $this->API_RESPONSE['config'] = Config::query()->first();
    $this->API_RESPONSE['appKey'] = file_get_contents(public_path('../hash'));
    return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
  }
  /**
   * Update Config
   * @param Request request
   * @return Illuminate\Http\JsonResponse
   */
  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => ['required', 'string'],
      'description' => ['required', 'string'],
      'currency' => ['required', 'string'],
      'open' => ['required', 'boolean'],
      'address' => ['required', 'string'],
      'phone' => ['nullable', 'numeric'],
      'phone_extra' => ['nullable', 'numeric'],
      'email' => ['nullable', 'string'],
      'social_facebook' => ['nullable', 'string'],
      'social_twitter' => ['nullable', 'string'],
      'social_instagram' => ['nullable', 'string'],
      'social_youtube' => ['nullable', 'string'],
    ]);
    if ($validator->fails()) {
      $this->API_RESPONSE['ERRORS'] = $validator->errors();
      $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
    } else {
      $validator = $validator->validate();
      $config = Config::query()->first();
      if (!$config)
        return response()->json(['No existe la configuracion'], 400, [], JSON_NUMERIC_CHECK);
      $config->name = $validator['name'];
      $config->description = $validator['description'];
      $config->currency = $validator['currency'];
      $config->open = $validator['open'];
      $config->phone = $validator['phone'];
      $config->phone_extra = $validator['phone_extra'];
      $config->email = $validator['email'];
      $config->social_facebook = $validator['social_facebook'];
      $config->social_twitter = $validator['social_twitter'];
      $config->social_instagram = $validator['social_instagram'];
      $config->social_youtube = $validator['social_youtube'];
      if ($config->save())
        $this->API_RESPONSE = $config;
      else {
        $this->API_STATUS = $this->AVAILABLE_STATUS['SERVICE_UNAVAILABLE'];
        $this->API_RESPONSE = $config->errors;
      }
    }
    return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
  }
}
