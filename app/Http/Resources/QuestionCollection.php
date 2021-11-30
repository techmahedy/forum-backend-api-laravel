<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => [
                'questions' => $this->collection->map(function($data) {
                    return [
                        'id'         => $data->id,
                        'title'      => $data->question_title,
                        'slug'       => $data->question_slug,
                        'details'    => $data->question_body,
                        'created'    => \Carbon\Carbon::parse($data->created_at)->toDateTimeString(),
                        'created_by' => $data->user->name,
                        'category'   => $data->category->category_name,
                        'replies_count'       => $data->replies_count,
                        'path' => '/question/' . $data->question_slug
                    ];
                })
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
