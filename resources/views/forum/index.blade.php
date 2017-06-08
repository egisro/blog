@extends('layouts.forum')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h2 class="display-3">Welcome to a forum</h2>
                <p class="lead">Thank you so much for visiting our forum. Please leave your opinion about our pizzeria!</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                    <a class="btn btn-outline-success btn-lg" href="#" role="button">Popular posts</a>
                </p>
            </div>
        </div>
    </div>


        <div class="row">

            <div class="col-md-8">
                @foreach($posts as $post)
                <div class="card card" style="background-color: #E0F8E0; border-color: ##3ADF00;">
                    <div class="card-block">
                        <h3 class="card-title">{{ $post -> title }}</h3>
                        <p class="card-text">{{ substr($post->body, 0, 200) }}{{ strlen($post -> body) > 200 ? "...":"" }}</p>
                        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-success">Read more</a>
                    </div>

                </div>
                    <hr>
                @endforeach
            </div>

                <div class="col-md-3 col-md-offset-1">
                    <h2>Sidebar</h2>
                </div>
        </div>











@stop