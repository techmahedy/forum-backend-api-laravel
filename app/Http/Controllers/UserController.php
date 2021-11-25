<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Api\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class UserController extends Controller
{   
    protected $response;

    public function __construct(ApiResponse $apiResponse)
    {
        $this->response = $apiResponse;
    }

    public function getAllActiveUsers(User $user)
    {
        try   
        {  
            $user = $user->get()->map(function($user){
                return [
                    'name'  => $user->name,
                    'email' => $user->email
                ];
            });
          
            return $this->response->successWithData('', 'users', $user);

        } catch(\Exception $e) { 
            if (!($e instanceof NotFoundHttpException)) {
                app()->make(\App\Exceptions\Handler::class)->report($e); 
            }
            return $this->response->errorLog($e);
        }
    }
}
