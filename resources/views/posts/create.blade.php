@extends('layouts.forum')
@section('title', '| Create New Post')
    @section('stylesheets')
        {!! HTML::style('css/parsley.css') !!}
    @endsection
    @section('content')
        <div class="center-block">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Create New Post</h2>
                <hr>
                {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength'=>'100']) }}

                {{ Form::label('slug', 'Slug') }}
                {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlenth' => '255']) }}

                {{ Form::label('body','Enter your post here:') }}
                {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::submit('Post',['class' => 'btn btn-outline-success btn-lg btn-block', 'style' => 'margin-top: 20px']) }}

                {!! Form::close() !!}

            </div>
        </div>
        </div>
    @endsection

@section('scripts')
    {!! HTML::script('js/parsley.min.js') !!}
@endsection