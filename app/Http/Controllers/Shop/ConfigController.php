<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    /**
     * Get Config
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        $this->API_RESPONSE = Config::query()->first();
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
            'currency' => ['required', 'string'],
            'open' => ['required', 'boolean'],
            'address' => ['required', 'string'],
            'phone' => ['nullable', 'string'],
            'phone_extra' => ['nullable', 'string'],
            'email' => ['nullable', 'string'],
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
            $config->currency = $validator['currency'];
            $config->open = $validator['open'];
            $config->phone = $validator['phone'];
            $config->phone_extra = $validator['phone_extra'];
            $config->email = $validator['email'];
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
