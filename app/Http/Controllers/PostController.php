<?php

namespace App\Http\Controllers;

use App\Post;
//use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create variable to store all posts in it from the db
        $posts = Post::orderBy('id', 'desc') -> paginate(20);

        // return a view and pass it in the created above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating data
        $this->validate($request, ['title' => 'required|max:100', 'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug', 'body' => 'required']);

        // store in the db
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        // show message if data was successfully saved to db
        Session::flash('success', 'The post was successfully saved');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the db and save as a variable
        $post = Post::findOrFail($id);
        // return the view and pass in the variable we've previously created
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the data
        $post = Post::findOrFail($id);
        if ($request ->input('slug') == $post -> slug) {
            $this->validate($request, ['title' => 'required|max:100', 'body' => 'required']);
        } else {
            $this->validate($request, ['title' => 'required|max:100', 'slug' => 'required|alpha_dash|min:5|max|255|unique:posts,slug', 'body' => 'required']);
        }

        // save data to the db
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();
        //set flash data wit the success message
        Session::flash('success', 'This post was successfully saved!');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'Post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
