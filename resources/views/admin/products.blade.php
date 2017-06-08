@extends('layouts.master')

@section('content')


<div>

    <span style="font-size: 2em;">Admin Panel : <strong>All Products</strong></span>
    <a href="{{ route('admin.create') }}"><button type="button" class="btn btn-outline-primary pull-right">Add new product</button></a>


    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Picture</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach($products as $product)

            <tbody>
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->title }}</td>
                <td><img style="max-width: 100px;" src="/storage/img/{{ $product->picture }}" alt="img" ></td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td><a style="font-size: 1.4em" href="{{ route('admin.edit', $product->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a style="font-size: 1.4em; margin-left: 8px;" href="{{ route('admin.destroy', $product->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>

            </tbody>
        @endforeach
    </table>
</div>

<div>
    <p>You have total of <strong> {{ count($products) }} </strong>products</p>
</div>

            {{--<script>--}}
                {{--$(document).ready(function () {--}}
                    {{--$('.add-product').on('click', function () {--}}
                        {{--var options = {--}}
                            {{--url:"http://127.0.0.1/{id}/add",--}}
                            {{--success: function (response) {--}}
                                {{--console.log(response);--}}
                                {{--for (var key in response) {--}}
                                    {{--var url = response[key].title;--}}
                                    {{--$('#kittens').append("<img scr='" + url +"'/>");--}}
                                {{--}--}}
                            {{--}--}}
                        {{--};--}}
                        {{--$.ajax(options);--}}
                    {{--})--}}
                {{--})--}}
            {{--</script>--}}

@stop