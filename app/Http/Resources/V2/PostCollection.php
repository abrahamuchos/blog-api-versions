<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    //Para laravel 9 esto no es necesario,
    //basicamente el Collection ya toma la refe del Resource
    public $collects = PostResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'organization' => 'Platzi',
                'version' => '2',
                'authors' => [
                    'J. Abraham Gonzalez',
                    'Platzi'
                ],
                'type' => 'articles'
            ]
        ];
    }
}
