<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FAQController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }

    public function index(){
        $FAQsByCategory = FAQ::all()->groupBy('category');
        return view('FAQ.index', compact('FAQsByCategory'));
    }

    public function create(){
        return view('FAQ.create');
    }

    public function store(Request $request)
{
    Log::info('Store method reached');

        // Validate the form input
        $validated = $request->validate([
            'question' => 'required|min:1|max:255',
            'answer' => 'required|min:1',
            'category' => 'nullable|string|max:255',
        ]);

        $FAQ = new FAQ();
        $FAQ->question = $validated['question'];
        $FAQ->answer = $validated['answer'];
        $FAQ->category = $validated['category'];

        $FAQ->save();

        return redirect()->route('FAQ.index')->with('status', 'FAQ added!');
}


    public function destroy($id){
        $FAQ = FAQ::findOrFail($id);

        if ($FAQ->user_id != Auth::user()->id) {
            abort(403, 'You are not authorized to delete this FAQ.');
        }

        $FAQ->delete();

        return redirect()->route('FAQ.index')->with('status', 'FAQ deleted!');
    }
}
