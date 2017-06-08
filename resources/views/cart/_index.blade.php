@extends('layouts.master')

@section('content')



<div class="container-fluid">
    <div class="row margin-top-20px">
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Your Cart</h1></div>
                <div class="table-responsive">
                    <table class="table table-products table-cart">
                        <tr>
                            <th>Title</th>
                            <th>Picture</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sum, Eur</th>
                            <th>Action</th>
                        </tr>
                        @foreach($cart->getItems() as $item)
                            <tr>
                                <td>{{ $item['product']->title }}</td>
                                <td><img style="max-width: 100px;margin-left: 15px;" src="/storage/img/{{ $item['product']->picture }}"></td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ $item['product']->price }}</td>
                                <td>{{ $item['price'] }}</td>
                                <td><a class="btn btn-outline-success" href="{{ route('cart.add', $item['product']->id) }}"><strong>+</strong></a>
                                    <a class="btn btn-outline-danger" href="{{ route('cart.remove', $item['product']->id) }}"><strong>-</strong></a></td>

                                <!-- <td class="text-right">Tax, 21%:</td> -->
                            <!-- <td class="text-right">Total:</td>

                               <td>{{$cart->getTotalPrice() }} $</td> -->


                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>Total:</strong></td>
                            <td><strong>{{$cart->getTotalPrice() }} €</strong></td>
                            <td></td>

                    </table>
                </div>
            </div>
            <form action="" method="POST" accept-charset="UTF-8"><input name="_token" type="hidden" value="EGD2yQjw1ogul4Z1rZRDHTf3xKzck75fWfZY7Sd7">
                <button class="btn btn-outline-success pull-right" type="submit">Order</button>
            </form>
    <p>
        <a href="{{ url('/') }}"><button type="button" class="btn btn-outline-primary">Continue shopping</button></a>
        <a href="{{ route('cart.flush')  }}"><button type="button" class="btn btn-outline-danger">Remove all products</button></a>
    </p>
@stop