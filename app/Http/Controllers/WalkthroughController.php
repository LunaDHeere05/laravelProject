<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Walkthrough;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class WalkthroughController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index');
    }


    public function index(){

        $walkthroughs = Walkthrough::latest()->get(); // gaat alle walkthroughs ophalen uit de database
        return view('walkthroughs.index', compact('walkthroughs'));
    }

    public function create(){
        return view('walkthroughs.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:20',
        ]);

        $walkthrough = new Walkthrough();
        $walkthrough->title = $validated['title'];
        $walkthrough->content = $validated['content'];
        $walkthrough->user_id = Auth::user()->id;
        $walkthrough->save();

        return redirect()->route('index')->with('status', 'Walkthrough created!');
    }

    public function edit($id){
        $walkthrough = Walkthrough::findOrFail($id);
        if($walkthrough->user_id != Auth::user()->id){
            abort(403);
        }
        return view('walkthroughs.edit', compact('walkthrough'));
    }
    public function update($id, Request $request){
        $walkthrough = Walkthrough::findOrFail($id);
        if($walkthrough->user_id != Auth::user()->id){
            abort(403);
        }

        $validated = $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:20',
        ]);

        if ($request->has('title')) {
            $walkthrough->title = $validated['title'];
        }elseif($request->has('content')) {
            $walkthrough->content = $validated['content'];
        }elseif($request->has('title') && $request->has('content')){
            $walkthrough->title = $validated['title'];
            $walkthrough->content = $validated['content'];
        }else{
            return redirect()->back()->with('status', 'Nothing changed!');
        }
        $walkthrough->save();

        return redirect()->route('index')->with('status', 'Walkthrough updated!');
    }
}

?>