<?php

namespace App\Http\Resources\flutter;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'added_ago' =>$this->created_at->diffForHumans(null, true, true),
        ];
    }
}
