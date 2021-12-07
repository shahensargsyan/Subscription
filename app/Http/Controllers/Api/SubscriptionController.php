<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateSubscriptionRequest;

class SubscriptionController extends Controller
{

    public function add(CreateSubscriptionRequest $request): JsonResponse
    {
        dd($request);
        if(!$request->has('contact_email_subscribe'))
            return response()->json([
                'error' => true,
                'message' => '',
            ]);

        $rules = array(
            'contact_email_subscribe' => 'required|email',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $json['error'] = true;
            return response()->json($json);
        }

        if(!Subscriber::where('email', $request->input('contact_email_subscribe'))->first())
        {
            Subscriber::create(['email' => $request->input('contact_email_subscribe')]);
        }

        $json['success'] = true;
        return response()->json($json);
    }
}
