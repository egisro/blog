@extends('layouts.master')

@section('content')

    <h1>Product List</h1>
    <p class="lead">Here's a list of all your products. <a href="{{ route('products.create') }}">Add a new one?</a></p>
    <hr>

    @foreach($products as $product)
        {{ $product->title }}
    @endforeach

    @foreach($products as $product)
        <h3>{{ $product->title }}</h3>
        <p>{{ $product->description}}</p>
        <p>{{ $product->price}} € </p>
        <p>{{ $product->quantity}}</p>
        <p><img src="storage/img/{{ $product->picture }}" alt="img" ></p>
        @if(auth()->check() && auth()->user()->isAdmin())
        <p>
            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View Product</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>

        </p>

        <p>
            <a href="{{ route('cart.add', $product->id) }}"><button type="button" class="btn btn-outline-success"><strong>+</strong></button></a>
            <a href="{{ route('cart.remove', $product->id) }}"><button type="button" class="btn btn-outline-danger"><strong>-</strong></button></a>

        </p>
        @endif
        <hr>
    @endforeach
@stop