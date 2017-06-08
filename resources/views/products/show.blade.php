@extends('layouts.master')

@section('content')

    <h1>{{ $product->title }}</h1>
    <p class="lead">{{ $product->description }}</p>
    <p class="lead">Price: {{ $product->price }} € </p>
    <p class="lead">Quantity avail.: {{ $product->quantity }}</p>
    <p><img src="/storage/img/{{ $product->picture }}" alt="img" ></p>

    <hr>

    <a href="{{ route('products.index') }}" class="btn btn-info">Back to all products</a>
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>

    <form method="post" action="product/{{ $product->id }}">
        {{ csrf_field() }}
        <input class="btn btn-danger" type="hidden" name="_method" value="delete">
        <input class="btn btn-danger" type="submit" value="DELETE">
    </form>
    <a href="{{ route('products.index') }}" class="btn btn-info">Add product to cart</a>

    {{--<div class="pull-right">--}}
        {{--<a href="" class="btn btn-danger">Delete this product</a>--}}
    {{--</div>--}}

@stop