<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('policy.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);
        return  view('policy.show')->with('post', $post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        // Delete the post
        $post->delete();

        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully');
    }
}
