<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function getIndex() {
        $posts = Post::paginate(10);
        return view('blog.index') -> withPosts($posts);
    }

    public function getSingle($slug) {

        // fech from the db based on slug
        $post = Post::where('slug', '=', $slug) -> first();

        //return the slug and pass in the post object
        return view('blog.single') -> withPost($post);
    }


}
