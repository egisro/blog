<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function contact()
    {
        return view('pages.contacts');
    }

    public function home()
    {
        $products = Product::paginate(9);
        return view('pages.home')->withProducts($products);
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.show')->withProduct($product);
    }

}
