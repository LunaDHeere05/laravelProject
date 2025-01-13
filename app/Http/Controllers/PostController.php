<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostController extends Controller
{
    public function index(){

        $posts = Post::latest()->take(5)->get(); // gaat alle walkthroughs ophalen uit de database
        return view('walkthroughs.index', compact('walkthroughs'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:20',
            'cover_picture'=>'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('cover_picture')) {
            $path = $request->file('cover_picture')->store('newsPosts', 'public');
            $post->cover_picture = $path;
        }
    
        $post->save();

        return redirect()->route('index')->with('status', 'post created!');
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        if($post->user_id != Auth::user()->id){
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    public function update($id, Request $request){
        $post = Post::findOrFail($id);
        if($post->user_id != Auth::user()->id){
            abort(403);
        }

        $validated = $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:20',
            'cover_picture'=>'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post->title = $validated['title'];
        $post->content = $validated['content'];
    
        // Update cover cover_picture if a new file is uploaded
        if ($request->hasFile('cover_picture')) {
            $path = $request->file('cover_picture')->store('walkthroughPosts', 'public');
            $post->cover_picture = $path;
        }
        $post->save();

        return redirect()->route('index');
    }

    public function destroy($id){
        if(!Auth::user()->is_admin){
            abort(403, 'only admins can delete posts');
        }
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('index')->with('status', 'post deleted!');
    }
}
