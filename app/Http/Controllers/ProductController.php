<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'title'=> 'required',
            'description'=> 'required'
         ]);
        $product=new Product();
        $product->title=$request->title;
        $product->description=$request->description;
        $product->save();
        return redirect()->route('table')->with('message', 'Added Successfully!');
    }

    public function index(){
        $product=Product::all();
        return view ('table',compact('product'));
    }

    public function edit($id){
    $product=Product::find($id);
    return view('edit',compact('product'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=> 'required',
            'description'=> 'required'
         ]);
        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->update();
        return redirect()->route('table')->with('message', 'Update Successfully!');

    }

    public function delete($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('table')->with('message', 'Delete Successfully!');
    }
}
