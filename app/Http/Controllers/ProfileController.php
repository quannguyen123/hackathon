<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $projects = $user->projects()->get();
  
        return view('users.dashboard', compact('projects'));
    }
    
}
