<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function show($id){
        $user = \App\User::find($id);

        return view('user.show', compact("user"));
    }

    public function setting(){
        $user = Auth::user();
        return view('user.setting', compact("user"));
    }
}
