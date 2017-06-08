
@extends('layouts.master')

@section('content')

    <div class="container-fluid">
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-12 text-center">

                <h1>{{ $product->title }}</h1>
                <p class="lead">{{ $product->description }}</p>
                <p class="lead">Price: {{ $product->price }} € </p>
                <p class="lead">Quantity avail.: {{ $product->quantity }}</p>
                <p><img src="/storage/img/{{ $product->picture }}" alt="img" ></p>

                <hr>

                <p>Cart: <a href="{{ route('cart.add', $product->id) }}" class="btn btn-outline-success"><strong>+</strong></a>
                    <a href="{{ route('cart.remove', $product->id) }}" class="btn btn-outline-danger"><strong>-</strong></a></p>
                <p><a href="{{ url('/') }}" class="btn btn-outline-primary">Back to products</a>
                    @if(auth()->check() && auth()->user()->isAdmin())
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning">Edit product</a>
                        <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-outline-danger">Remove product</a>
                    @endif
                </p>
            </div>
        </div>
    </div>
    </div>
    <br>
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('.')--}}
        {{--})--}}
    {{--</script>--}}

@stop