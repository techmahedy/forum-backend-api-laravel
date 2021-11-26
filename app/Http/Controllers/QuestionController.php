<?php

namespace App\Http\Controllers;

use App\Api\ApiResponse;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestion;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class QuestionController extends Controller
{
    protected $response;

    public function __construct(ApiResponse $apiResponse)
    {
        $this->response = $apiResponse;
    }

    public function index(Question $question)
    {
        $question = $question->with([
                            'user:id,name',
                            'category:id,category_name'
                        ])
                        ->orderBy('id','desc')
                        ->get();
        
        return $this->response->successWithData('', 'questions', $question);
    }

    public function show(Question $question)
    {
        $question = $question->load([
                            'user:id,name',
                            'category:id,category_name'
                        ]);
          
        return $this->response->successWithData('', 'question', $question);

    }

    public function store(StoreQuestion $request)
    {   
        try {  
            
            $question = new Question;
            $question->user_id        = $request->user_id;
            $question->category_id    = $request->category_id;
            $question->question_title = $request->question_title;
            $question->question_slug  = Str::slug($request->question_title);
            $question->question_body  = $request->question_body;

            if ( $question->save() ) {
                return $this->response->success('Question created successfully!');
            }
            return $this->response->error('Unprocessable requested entity!');

        } catch(\Exception $e) { 
            $this->response->errorLog($e);
            return $this->response->error($e->getMessage());
        }

    }

    public function edit(Question $question, Request $request)
    {  
        try {  

            $question->update([
                'category_id'    => $request->category_id,
                'question_title' => $request->question_title,
                'question_body'  => $request->question_body
            ]);

            return $this->response->success('Question updated successfully!');

        } catch(\Exception $e) { 
            $this->response->errorLog($e);
            return $this->response->error($e->getMessage());
        }

    }

    public function delete(Question $question)
    {
        try   
        {  
            $question->delete();
          
            return $this->response->success('Question deleted successfully!');

        } catch(\Exception $e) { 
            $this->response->errorLog($e);
            return $this->response->error($e->getMessage());
        }
    }
    
}
