@extends('layouts.master')

@section('content')

    <div class="alert alert-info" role="alert">
        <h1>Admin Panel: Add Product</h1>
    </div

    <p class="lead">Add a product to the list below</p>
    <hr>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

   <form method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="/products">
             {{ csrf_field() }}
       <div class="form-group row">
        <label class="col-md-2 col-form-label">Title</label>
        <div class="col-md-10">
            <input name="title" class="form-control" type="text" value="Add product title here" id="example-text-input">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">Description</label>
        <div class="col-md-10">
            <textarea name="description" class="form-control" rows="4"></textarea>

        </div>
    </div>
       <div class="form-group row">
           <label class="col-md-2 col-form-label">Price</label>
           <div class="col-md-10">
               <input name="price" class="form-control" type="text" value="Enter product price" id="example-number-input">
           </div>
       </div>

       <div class="form-group row">
           <label class="col-md-2 col-form-label">Quantity</label>
           <div class="col-md-10">
               <input name="quantity" class="form-control" type="number" value="Producs quantity" id="example-number-input">
           </div>
       </div>

       <div class="form-group row">
           <label class="col-md-2 col-form-label">File input</label>
           <div class="col-md-10">
               <input type="file" name="picture" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
               <small id="fileHelp" class="form-text text-muted">You can add a photo of the product here.
           </div>
       </div>

       <div class="form-group row">
           <button name="submit" type="submit" class="btn btn-primary">Add</button>

       </div>

  </form>

@endsection