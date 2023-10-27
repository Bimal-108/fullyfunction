<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
//        first simple way to compact data to index

//        $products = Product::get();
//        return view('products.index',compact('products'));

//        or another way

        return view('products.index',['products' => Product::latest()->paginate(5)]);
    }

    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
//        yeo dd vani chai data show garna ko lagi raw
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('main.route')->withSuccess('Product Created Successfully');
    }

    public function edit($id){
//        dd($id);
        $products = Product::where('id', $id)->first();
        return view('products.edit', compact('products'));
    }

    public function update(Request $request, $id){
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $product = Product::where('id', $id)->first();

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image = $imageName;
        }
//        yeo if kina laga ko vane yedi user ly image select garea thik xa natra null vayea pani updated hunxa vanera
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('Product Updated Successfully');
    }

    public function destroy($id) {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted Successfully');
    }
    public function view($id){
        $product = Product::where('id', $id)->first();
        return view('products.show',compact('product'));
    }
}
