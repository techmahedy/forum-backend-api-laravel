<?php

namespace App\Http\Controllers;

use App\Api\ApiResponse;
use App\Models\Question;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class ReplyController extends Controller
{
    protected $response;

    public function __construct(ApiResponse $apiResponse)
    {
        $this->response = $apiResponse;
    }
    
    public function index(Question $question)
    {   
        $replies = $question->replies;
        return $this->response->successWithData('','replies', $replies);
    }

    public function store(Question $question, Request $request)
    {
       try {
            $reply = $question->replies()->create([
                'user_id'    => $request->user_id,
                'reply_text' => 'Awesome article'
            ]);
            return $this->response->successWithData('Reply created successfully!','reply', $reply);
       } catch (\Throwable $th) {
           $this->response->errorLog($th);
           return $this->response->error($th->getMessage());
       }

    }


}
