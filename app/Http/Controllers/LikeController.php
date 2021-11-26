<?php

namespace App\Http\Controllers;

use App\Api\ApiResponse;
use App\Models\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    protected $response;

    public function __construct(ApiResponse $apiResponse)
    {
        $this->response = $apiResponse;
    }

    public function like(Reply $reply, Request $request)
    {  
       $reply = $reply->like()->create([
                    'user_id'    => $request->user_id
                ]);

       return $this->response->successWithData('Like created successfully!','like', $reply);

    }
}
