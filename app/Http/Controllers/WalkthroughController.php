<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Walkthrough;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Genre;

class WalkthroughController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }

    public function show($id){
        $walkthrough = Walkthrough::findOrFail($id);
        return view('walkthroughs.show', compact('walkthrough'));
    }

    public function index(){

        $posts = Post::latest()->get();
        $walkthroughs = Walkthrough::latest()->get(); // gaat alle walkthroughs ophalen uit de database
        return view('walkthroughs.index', compact('posts','walkthroughs'));
    }

    public function create(){
        $genres = Genre::all();
        return view('walkthroughs.create', compact('genres'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:20',
            'cover_picture'=>'image|mimes:jpeg,png,jpg|max:2048',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);

        $walkthrough = new Walkthrough();
        $walkthrough->title = $validated['title'];
        $walkthrough->content = $validated['content'];
        $walkthrough->user_id = Auth::user()->id;
        $walkthrough->save();
        
        if ($request->has('genres')) {
            $walkthrough->genres()->sync($validated['genres']);
        }

        return redirect()->route('index')->with('status', 'Walkthrough created!');
    }

    public function edit($id){
        $walkthrough = Walkthrough::findOrFail($id);
        if($walkthrough->user_id != Auth::user()->id){
            abort(403);
        }
        $genres = Genre::all();
        return view('walkthroughs.edit', compact('walkthrough','genres'));
    }

    public function update($id, Request $request){
    $walkthrough = Walkthrough::findOrFail($id);
    if ($walkthrough->user_id != Auth::user()->id) {
        abort(403);
    }

    $validated = $request->validate([
        'title' => 'required|min:3',
        'content' => 'required|min:20',
        'cover_picture' => 'image|mimes:jpeg,png,jpg|max:2048',
        'genres' => 'array',
        'genres.*' => 'exists:genres,id',
    ]);

    if ($request->has('title')) {
        $walkthrough->title = $validated['title'];
    }

    if ($request->has('content')) {
        $walkthrough->content = $validated['content'];
    }

    if ($request->hasFile('cover_picture')) {
        $path = $request->file('cover_picture')->store('walkthroughs', 'public');
        $walkthrough->cover_picture = $path;
    }
    if ($request->has('genres')) {
        $walkthrough->genres()->sync($validated['genres']);
    }


    $walkthrough->save();

    return redirect()->route('index')->with('status', 'Walkthrough updated!');
}


    public function destroy($id){
        if(!Auth::user()->is_admin){
            abort(403, 'only admins can delete walkthroughs');
        }
        $walkthrough = Walkthrough::findOrFail($id);
        $walkthrough->delete();

        return redirect()->route('index')->with('status', 'Walkthrough deleted!');
    }
}

?>