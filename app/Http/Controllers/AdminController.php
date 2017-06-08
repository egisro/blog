<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function products()
    {
        $products = Product::all();

        return view('admin.products')->with('products', $products);

    }
    public function create()
    {
        $message = Session()->get('message');
        return view('admin.create');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit')->withProduct($product);

    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product -> destroy($id);
        Session::flash('flash_message', 'Product deleted successfully!');

        return redirect()->route('admin.products');
    }

}
