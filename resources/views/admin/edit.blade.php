@extends('layouts.master')

@section('content')

    <span style="font-size: 2em;">Admin Panel : <strong>Edit product <span style="font-style: italic">&lt; {{ $product->title }} &gt;</span></strong></span>
    <a href="{{ url('/admin/products') }}"><button type="button" class="btn btn-outline-primary pull-right">Back to products</button></a>

    <hr>



    <form method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="/products/{{$product->id}}">

        <input type="hidden" name="_method" value="patch">
                {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Title</label>
                <div class="col-md-10">
                    <input name="title" class="form-control" type="text" value="{{$product->title}}" id="example-text-input">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Description</label>
                <div class="col-md-10">
                    <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Price</label>
                <div class="col-md-10">
                    <input name="price" class="form-control" type="text" value="{{$product->price}}" id="example-number-input">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Quantity</label>
                <div class="col-md-10">
                    <input name="quantity" class="form-control" type="number" value="{{$product->quantity}}" id="example-number-input">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label"><p><img style="width: 200px;" src="/storage/img/{{ $product->picture }}" alt="img" ></p></label>
                <div class="col-md-6">
                    <input type="file" name="picture" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">You can change a photo by adding new one here.
                </div>
            </div>

        <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <button name="submit" type="submit" class="btn btn-outline-success">Update Product</button>
            </div>
        </div>

    </form>

@stop