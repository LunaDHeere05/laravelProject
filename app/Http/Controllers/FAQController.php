<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ; 
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }

    public function index(){
        $FAQs = FAQ::all();
        return view('FAQ.index', compact('FAQs'));
    }

    // public function create(){
    //     return view('components.FAQ.create');
    // }

    // public function store(Request $request){
    //     // Validate the form input
    //     $validated = $request->validate([
    //         'question' => 'required|min:5|max:255',
    //         'answer' => 'required|min:10',
    //     ]);

    //     $FAQ = new FAQ();
    //     $FAQ->question = $validated['question'];
    //     $FAQ->answer = $validated['answer'];
    //     $FAQ->user_id = Auth::user()->id;
    //     $FAQ->save();

    //     return redirect()->route('FAQ.index')->with('status', 'FAQ added!');
    // }

    public function destroy($id){
        $FAQ = FAQ::findOrFail($id);

        if ($FAQ->user_id != Auth::user()->id) {
            abort(403, 'You are not authorized to delete this FAQ.');
        }

        $FAQ->delete();

        return redirect()->route('FAQ.index')->with('status', 'FAQ deleted!');
    }
}
