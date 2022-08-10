<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Resources\V1\PostResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\V1\PostResource;
     */
    public function index()
    {
        $posts = Post::latest()->paginate();
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return App\Http\Resources\V1\PostResource;
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return Illuminate\Contracts\Routing\ResponseFactory::json
     */
    public function destroy(Post $post)
    {
        if (!$post->trashed()) {
            $postDeleted = $post->delete();
        }
        return response()->json($post, 204);
    }


    /**
     * Hard delete the specified resource from storage
     * @param number $id
     *
     * @return Illuminate\Contracts\Routing\ResponseFactory::json
     */
    public function hardDestroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        if (!is_null($post) && $post->trashed()) {
            $post->forceDelete();
            return response()->json($post);
        } else {
            return response()->json([
                'error' => 23213,
                'message' => "Error, posts don't was soft delete"
            ], 405);
        }
    }
}
