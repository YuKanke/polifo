<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tag;


class UserController extends Controller
{
    public function show($id){
        $user = \App\User::find($id);

        return view('user.show', compact("user"));
    }

    public function setting(){
        $user = Auth::user();
        $categorys = Tag::select("category")->groupBy('category')->get();
                
        foreach($categorys as $category){
            $tags[] = Tag::where('category', $category->category)->get(); 
        }
        
        return view('user.setting', compact("user",'tags'));
    }
}
