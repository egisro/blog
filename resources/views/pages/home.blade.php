@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>About Pizza</h1>
            <p class="lead" style="text-align: justify">Pizza is a yeasted flatbread typically topped with tomato sauce and cheese and baked in an oven. It is commonly topped with a selection of meats, vegetables and condiments. The term was first recorded in the 10th century, in a Latin manuscript from Gaeta in Central Italy.[1] The modern pizza was invented in Naples, Italy, and the dish and its variants have since become popular and common in many areas of the world.[2]
                In 2009, upon Italy's request, Neapolitan pizza was safeguarded in the European Union as a Traditional Speciality Guaranteed dish.[3][4] The Associazione Verace Pizza Napoletana (the True Neapolitan Pizza Association) is a non-profit organization founded in 1984 with headquarters in Naples. It promotes and protects the "true Neapolitan pizza".[5]
                Pizza is sold fresh or frozen, either whole or in portions, and is a common fast food item in Europe and North America.[6] Various types of ovens are used to cook them and many varieties exist. Several similar dishes are prepared from ingredients commonly used in pizza preparation, such as calzone and stromboli.
                <a class="pull-right" href="https://en.wikipedia.org/wiki/Pizza">/ From Wikipedia, the free encyclopedia /</a>
            </p>

            <hr>
            <br>
        </div>
    </div>

    <div class="main-menu">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="row" id="scrollTo">
                        @foreach($products as $product)

                                <div class="col-md-4 text-center menu-dish">
                                    <div class="menu-dish-box">
                                        <h3><a href="{{ route('pages.show', $product->id) }}">{{ $product->title }}</a></h3>
                                        <p class="img_size"><img src="storage/img/{{ $product->picture }}" alt="img" ></p>
                                        <p>{{ $product->description}}</p>
                                        <p>{{ $product->price}} € </p>
                                        <p><a href="{{ route('cart.add', $product->id) }}" class="btn btn-outline-primary">Add to Cart</a></p>
                                    </div>
                                    <br>
                                </div>

                        @endforeach
                    </div>


                   <div class="row">
                       <div class="col-md-12">
                           <div class="pagination justify-content-center">
                               {{  $products -> links('vendor.pagination.bootstrap-4') }}
                           </div>
                       </div>
                   </div>
                    <br>
                    {{--<hr>--}}
                </div>
            </div>
        </div>
    </div>

@stop