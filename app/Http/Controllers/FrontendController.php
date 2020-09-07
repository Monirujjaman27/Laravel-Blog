<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Brand;
use App\Post;
use Session;
use Illuminate\Support\str;
class FrontendController extends Controller
{
//    index page
    public function index()
    {
        $allPost = Post::orderBy('created_at', 'DESC')->paginate(9);
        // $tags = Tag::orderBy('id', 'desc')->paginate(20);
        // $category = Category::orderBy('id', 'desc')->paginate(20);
        return view('website.home', compact('allPost'));
    }

    public function about()
    {
        return view('website.about');
    }
    public function category()
    {
        return view('website.category');
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function post($slug)
    {
        $alltags = Tag::orderBy('id', 'desc')->paginate(100);
        $post = Post::with('category', 'user', 'tags')->where('slug',$slug)->get();
        $allcategory = Category::orderBy('id', 'desc')->paginate(100);
        if($slug){
            return view('website.post', compact(['post', 'alltags', 'allcategory']));
        }else{
            return redirect('/');
        }

    }
    
}