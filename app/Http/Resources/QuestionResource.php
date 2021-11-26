<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'data' => [
                'question' => [
                    'id'         => $this->id,
                    'title'      => $this->question_title,
                    'slug'       => $this->question_slug,
                    'details'    => $this->question_body,
                    'created'    => \Carbon\Carbon::parse($this->created_at)->toDayDateTimeString(),
                    'created_by' => $this->user->name,
                    'category'   => $this->category->category_name
                ]
            ]
        ];
    }

    public function with($request)
    {
        return [
            'isSuccess' => true,
            'message' => ''
        ];
    }
}
