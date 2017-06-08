@extends('layouts.forum')
@section('title', '| View Post')
    @section('content')
@section('stylesheets')
    {!! HTML::style('css/forum.css') !!}
@endsection
        <div class="row">
            <div class="col-md-8">
        <h2>{{ $post -> title }}</h2>
        <p class="lead">{{ $post -> body }}</p>
            </div>
            <div class="col-md-4">
                <div class="card card-outline-success" style="padding:20px; background-color: #EFFBEF;">



                    <dl class="card-block">
                        <dt>URL:</dt>
                        <dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
                        <dt>Created At:</dt>
                        <dd>{{ date('Y-m-d, H:i', strtotime($post -> created_at)) }}</dd>
                        <dt>Last updated:</dt>
                        <dd>{{ date('Y-m-d, H:i', strtotime($post -> updated_at)) }}</dd>

                    </dl>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! HTML::linkRoute('posts.edit', 'Edit', [$post -> id], ['class' => 'btn btn-outline-success btn-block']) !!}

                        </div>
                        <div class="col-sm-6">
                            {!!  Form::open(['route' => ['posts.destroy', $post -> id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete', ["class" => 'btn btn-outline-danger btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ HTML::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-outline-info btn-block btn-spacing']) }}
                        </div>
                    </div>

                </div>

            </div>
        </div>
@endsection