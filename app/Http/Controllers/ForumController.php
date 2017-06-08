<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc') -> limit(4) -> get();
        return view('forum.index') -> withPosts($posts);
    }
}
