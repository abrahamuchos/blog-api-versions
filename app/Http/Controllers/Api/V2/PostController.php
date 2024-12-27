<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Resources\V2\PostCollection;
use App\Http\Resources\V2\PostResource;

class PostController extends Controller
{
    /**
     * Return all posts
     * @return PostCollection
     */
    public function index(): PostCollection
    {
        $posts = Post::latest()->paginate();

        return new PostCollection($posts);
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
}
