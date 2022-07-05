<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'title'=> 'required',
            'description'=> 'required',
            'status' => 'required',
            'category_id' => 'required',
            'profile_image'=>'required'

         ]);
        $product=new Blog();
        $product->title=$request->title;
        $product->description=$request->description;
        $product->status=$request->status;
        $product->category_id=$request->category_id;
        if($request->hasFile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/blogs/',$filename);
            $product->profile_image = $filename;
        }

        $product->save();
        return redirect()->route('table')->with('message', 'Data Added Successfully!');
    }

    public function create(Request $request){
        $categories = Category::all();
        return view('blog.create',compact('categories'));
    }

    public function index(){
        $product=Blog::with('category')->latest()->paginate(10);
        return view ('blog.index',compact('product'));
    }

    public function edit($id){
        $categories = Category::all();

    $product=Blog::with('category')->find($id);
    return view('blog.editform',compact('product','categories'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=> 'required',
            'description'=> 'required',
            'status' => 'required',
            'category_id' => 'required',
            'profile_image'=>'nullable'

         ]);
        $product=Blog::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->status=$request->status;
        $product->category_id=$request->category_id;
        if($request->hasFile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/blogs/',$filename);
            $product->profile_image = $filename;
        }
        $product->update();
        return redirect()->route('table')->with('message', 'Update Successfully!');

    }

    public function delete($id){
        $product=Blog::find($id);
        $product->delete();
        return redirect()->route('table')->with('message', 'Delete Successfully!');
    }
}
