@extends('layouts.forum')

@section('title', "| Blog}")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Blog</h2>
        </div>
    </div>


    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>{{ $post -> title }}</h3>
            <h5>Published: {{ date('Y-m-d, H:i', strtotime($post->created_at)) }}</h5>
            <p>{{ substr($post -> body, 0, 250) }}{{ strlen($post->body) > 250 ? '...': "" }}</p>

            <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-outline-success">Read More</a>
        </div>

    </div>
    <hr>

    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="pagination justify-content-center">
                {{  $posts -> links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>


@endsection