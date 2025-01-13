<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use App\Models\Walkthrough;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function likeWalkthrough($walkthroughId, Request $request)
    {
        $walkthrough = Walkthrough::findOrFail($walkthroughId);

        // Check if the user is trying to like their own walkthrough
        if ($walkthrough->user_id == Auth::user()->id) {
            abort(403, 'Cannot like your own walkthrough');
        }

        // Check if the user already liked this walkthrough
        $like = Like::where('walkthrough_id', $walkthroughId)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($like) {
            abort(403, 'You already liked this walkthrough');
        }

        // Create a new like
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->walkthrough_id = $walkthroughId;
        $like->save();

        return redirect()->route('walkthroughs.show', $walkthroughId)
            ->with('status', 'Walkthrough liked successfully');
    }

    public function likePost($postId, Request $request)
    {
        $post = Post::findOrFail($postId);

        // Check if the user is trying to like their own post
        if ($post->user_id == Auth::user()->id) {
            abort(403, 'Cannot like your own post');
        }

        // Check if the user already liked this post
        $like = Like::where('post_id', $postId)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($like) {
            abort(403, 'You already liked this post');
        }

        // Create a new like
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->post_id = $postId;
        $like->save();

        return redirect()->route('posts.show', $postId)
            ->with('status', 'Post liked successfully');
    }
}
