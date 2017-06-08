@extends('layouts.master')

@section('content')

    <h1>Product List</h1>

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

            <p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View Product</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Add to Cart</a>

            </p>

        <hr>
    @endforeach
@stop