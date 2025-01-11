<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Walkthrough;

class WalkthroughController extends Controller
{
    public function index(){

        $walkthroughs = Walkthrough::all(); // gaat alle walkthroughs ophalen uit de database
        return view('walkthroughs.index', compact('walkthroughs'));
    }
}

?>