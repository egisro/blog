@extends('layouts.forum')
@section('title', '| Edit Post')
@section('stylesheets')
    {!! HTML::style('css/forum.css') !!}
@endsection
    @section('content')
        <div class="row">


            <div class="col-md-8">
                {!! Form::model($post, ['route' => ['posts.update', $post -> id], 'method' => 'PUT']) !!}

                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ["class" => 'form-control form-control-lg']) }}

                {{ Form::label('slug', 'Slug:', ["class" => "form-spacing-top"]) }}
                {{ Form::text('slug', null, ['class' => 'form-control']) }}

                {{ Form::label('body', 'Body:', ["class" => "form-spacing-top"]) }}
                {{ Form::textarea('body', null, ["class" => 'form-control', ]) }}

            </div>

            <div class="col-md-4">
                <div class="card card-outline-success" style="padding:20px; background-color: #EFFBEF;">
                    <dl class="card-block">
                        <dt>Created At:</dt>
                        <dd>{{ date('Y-m-d, H:i', strtotime($post -> created_at)) }}</dd>
                        <dt>Last updated:</dt>
                        <dd>{{ date('Y-m-d, H:i', strtotime($post -> updated_at)) }}</dd>

                    </dl>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! HTML::linkRoute('posts.show', 'Cancel', [$post -> id], ['class' => 'btn btn-outline-danger btn-block']) !!}

                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save Changes',  ["class" => "btn btn-outline-success btn-block"]) }}
                        </div>
                    </div>

                </div>

            </div>
            {!! Form::close() !!}

        </div>
@endsection