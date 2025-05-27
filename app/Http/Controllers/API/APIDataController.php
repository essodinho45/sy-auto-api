<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ApiData;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class APIDataController extends Controller
{
    public function addData(Request $request)
    {
        try {
            $data = new ApiData();
            foreach ($data->getFillable() as $property) {
                if ($request->has($property)) {
                    $data->{$property} = $request->input($property);
                }
            }
            $data->save();
            return response('success', 200);
        } catch (\Throwable $e) {
            Log::info(\json_encode($e));
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
