<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;

class PortfolioController extends Controller
{
    public function list(){
        $portfolios = Portfolio::get();

        return view("list", compact("portfolios"));
    }
}
