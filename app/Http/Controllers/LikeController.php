<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Models\Walkthrough;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function like($walkthroughId, Request $request)
    {
        $walkthrough = Walkthrough::findOrFail($walkthroughId);
        if($walkthrough->user_id == Auth::user()->id){
            abort(403, 'Cannot like your own post');
        }
        $like = Like::where('walkthrough_id', "=", $walkthroughId)->where('user_id', "=", Auth::user()->id)->first();

        if($like != NULL){
            abort(403, 'Cannot like a post twice');
        }


        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->walkthrough_id = $walkthroughId;
        $like->save();

        return redirect()->route('index')->with('status', 'Post liked successfully');
    }
}
