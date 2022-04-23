<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    // index

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // create page form

    public function createProduct()
    {
        return view('products.create');
    }

    // store

    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required|max:55',
            'price' => 'required',
            'category' => 'required'
        ]);


        $photo = $request->thumbnail;

        if($photo) {
            $photoname = time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 350)->save(public_path('files/products/'.$photoname));
        }

        Product::insert([
            'thumbnail' => '/files/products/'.$photoname,
            'title' => $request->title,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description
        ]);

        return redirect()->route('product.index');
    }

    // edit product


    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    // update product

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:55',
            'price' => 'required',
            'category' => 'required'
        ]);


        $photo = $request->thumbnail;

        if($photo) {
            $photoname = time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 350)->save(public_path('files/products/'.$photoname));
        }

        Product::find($id)->update([
            'thumbnail' => '/files/products/'.$photoname,
            'title' => $request->title,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description
        ]);

        return redirect()->route('product.index');
    }

    // delete product

    public function destroy($id)
    {
        $product = Product::find($id);
        if(File::exists($product->thumbnail)){
            unlink($product->thumbnail);
        }

        $product->delete();

        return redirect()->route('product.index');
    }

    // search using ajax

    public function search(Request $request)
    {

        if($request->ajax()) {

            $output = '';
            $products = Product::where('title', 'LIKE', '%'.$request->search.'%')
            ->orWhere('price', 'LIKE', '%'.$request->search.'%')
            ->orWhere('category', 'LIKE', '%'.$request->search.'%')
            ->get();

            if($products) {

                foreach($products as $product) {


                    $output .=
                    '<div class="card-body mt-2 mb-2">
                      <img class="card-img-top" src="'.$product->thumbnail.'" alt="Card image cap">
                      <h5 class="card-title"><b>'.$product->title.'</b></h5>
                      <h5 class="card-title">$'.$product->price.'</h5>
                      <h5 class="card-title"><b class="text-success">'.$product->category.'</b></h5>

                    </div>';

                }

               return response()->json($output);
            }

        }

        return view('products.search');

    }

}
