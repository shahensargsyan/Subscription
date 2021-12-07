<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Website;
use App\Http\Requests\WebsiteRequest;

class WebsiteController extends Controller
{
    public function add(WebsiteRequest $request): JsonResponse
    {
        Website::create(['domain' => $request->input('domain')]);

        $json['success'] = true;
        return response()->json($json);
    }
}
