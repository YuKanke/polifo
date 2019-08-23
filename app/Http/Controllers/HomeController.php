<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $portfolio_popular = \App\Portfolio::joinReactionCounterOfType('Like')->orderBy('reaction_like_count', 'desc')->take(4)->get();

        $portfolio_new = \App\Portfolio::orderBy('created_at', 'desc')->take(4)->get();
        return view('home', compact('portfolio_popular', 'portfolio_new'));
    }
}
