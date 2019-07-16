<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id){
        $user = \App\User::find($id);

        return view('user.index', compact("user"));
    }

    public function show($id){
        $user = \App\User::find($id);

        return view('user.show', compact("user"));
    }
}
