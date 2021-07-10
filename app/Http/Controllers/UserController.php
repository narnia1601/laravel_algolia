<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $results = null;
        if(request('name') || request('post')){
            if(request('name') && !request('post')){
                $nameResults = Post::search(request('name'))->get();
                $results = collect($nameResults);
            }
            else if(!request('name') && request('post')){
                $postResults = Post::search(request('post'))->get();
                $results = collect($postResults);
            }
            else{
                $nameResults = Post::search(request('name'))->get();
                $postResults = Post::search(request('post'))->get();
                $results = collect($nameResults)->concat($postResults);
            }
        }
        return view('welcome', ['users'=> $users,'results'=> $results]);
    }
}
