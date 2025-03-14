<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display the landing page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        
        return view('landing');
    }
}