@extends('layouts.forum')

@section('title', '| All Posts')
    @section('content')
    <div class="row">
        <div class="col-md-10">
            <h2>All Posts</h2>
        </div>
        <div class="col-md-2">
            {!!  HTML::linkRoute('posts.create', 'Create New Post', [], ['class' => 'btn btn-outline-success btn-block', 'style' => 'margin-top:5px;']) !!}
        </div>
        <div class="col-md-12">
            <hr>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>{{ $post -> id }}</th>
                            <td>{{ $post -> title }}</td>
                            <td>{{ substr($post -> body, 0, 50) }}{{ strlen($post -> body) > 100 ? "..." : "" }}</td>
                            <td>{{ date('Y-m-d, H:i', strtotime($post -> created_at)) }}</td>
                            <td><a href="{{ route('posts.show', $post -> id) }}" class="btn btn-secondary btn-sm">view</a><a href="{{  route('posts.edit', $post -> id)}}" class="btn btn-secondary btn-sm">edit</a></td>
                        </tr>

                        @endforeach
                </tbody>

            </table>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="pagination justify-content-center">
                {{  $posts -> links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>


@stop