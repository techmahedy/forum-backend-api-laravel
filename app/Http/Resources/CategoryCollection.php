<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => [
                'categories' => $this->collection->map(function($data) {
                    return [
                        'id'         => $data->id,
                        'name'       => $data->category_title,
                        'slug'       => $data->category_slug,
                        'created_at'    => Carbon::parse($data->created_at)->toDateTimeString()
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
