<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int                        $id
 * @property int                        $user_id
 * @property string                     $title
 * @property string                     $slug
 * @property string                     $content
 * @property string                     $excerpt
 * @property \Illuminate\Support\Carbon $published_at
 * @property-read \App\Models\User      $user
 */
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'post_name' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'autor' => [
                'name' => $this->user->name,
                'email' => $this->user->email
            ],
            'created_at' => $this->published_at
        ];
    }
}
