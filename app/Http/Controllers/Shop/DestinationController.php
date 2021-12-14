<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DestinationController extends Controller
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
            'price' => ['required', 'numeric'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            $dest = new Destination($validator);
            if ($dest->save())
                $this->API_RESPONSE = $dest;
            else {
                $this->API_RESPONSE = $dest->errors;
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
        $dest = Destination::query()->find($id);
        if ($dest->delete())
            return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
        else
            return response()->json(['No se encontro'], 400, [], JSON_NUMERIC_CHECK);
    }
    /**
     * List
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $this->API_RESPONSE = Destination::all();
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
    /**
     * Update
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function update(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            $dest = Destination::query()->find($id);
            if (!$dest)
                return response()->json(['Destinacion no encontrada'], 400, [], JSON_NUMERIC_CHECK);
            if ($dest->update($validator))
                $this->API_RESPONSE = $dest;
            else {
                $this->API_RESPONSE = $dest->errors;
                $this->API_STATUS = 503;
            }
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
}
