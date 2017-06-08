<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;




class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();


        return view('products.index')->withProducts($products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = Session()->get('message');
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//       dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);
        $input = $request->all();
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $path = $file->store('public/img');
            $input['picture'] = basename($path);

        } else {
            $input['picture'] = 'dummy.jpg';
        }


        Product::create($input);

        Session::flash('flash_message', 'Product successfully added!');


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::findOrFail($id);
        return view('products.edit')->withProduct($product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        $input = $request->all();
//        dd($input);
        if ($request->hasFile('picture'))
        {
            $picture=$request->file('picture');
            $path = $picture->store('public/img');
            $input['picture'] = basename($path);
        }

        $product->fill($input)->save();

        Session::flash('flash_message', 'Product successfully added!');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->destroy();
        Session::flash('flash_message', 'Product deleted successfully!');

        return redirect()->route('products.index');
    }

}
