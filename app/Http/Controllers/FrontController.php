<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blog;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::latest()->paginate(4);
        $featured_blog =Blog::latest()->first();
        return view('welcome',compact('categories','blogs','featured_blog'));
    }

    public function show(Request $request,$id)
{

    $categories = Category::all();
    $blogs = blog::with('category')->find($id);

    return view('blog.show',compact('blogs','categories'));
}

    public function FunctionName()
{
    return view('about');
}

}
