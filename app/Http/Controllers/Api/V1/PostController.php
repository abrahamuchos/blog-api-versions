<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Resources\V1\PostResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $posts = Post::latest()->paginate();
        return PostResource::collection($posts);
    }

    /**
     * @param Post $post
     *
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Soft delete the specified resource from storage
     * @param Post $post
     *
     * @return JsonResponse
     */
    public function destroy(Post $post): JsonResponse
    {
        if (!$post->trashed()) {
            $postDeleted = $post->delete();
        }
        return response()->json([
            'status' => 'sucess',
            'message' => 'post was deleted',
            'post' => $post
        ]);
    }


    /**
     * hard delete the specified resource from storage
     * After has been soft deleted
     * @param $id
     *
     * @return JsonResponse
     */
    public function hardDestroy($id): JsonResponse
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        if (!is_null($post) && $post->trashed()) {
            $post->forceDelete();
            return response()->json([
                'status' => 'success',
                'message' => 'post was deleted',
                'post' => $post
            ]);
        } else {
            return response()->json([
                'error' => 23213,
                'message' => "Error, posts don't was soft delete"
            ], 405);
        }
    }
}
