<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\tag;
use App\post;
use Session;
use Illuminate\Support\str;
use App\FrontendSetting;
class FrontendController extends Controller
{
//    index page
    public function index()
    {      
        $allPost = post::orderBy('created_at', 'DESC')->paginate(9);
        $headerPost = post::orderBy('created_at', 'DESC')->take(5)->get();

        $firstPost  = $headerPost->splice(0, 2);
        $middlePost = $headerPost->splice(0, 1);
        $lastPost   = $headerPost->splice(0);

        $footerpost = Post::orderBy('created_at', 'DESC')->take(5)->get();
        $footerFirstPost  = $footerpost->splice(0, 1);
        $footerMiddlePost = $footerpost->splice(0, 2);
        $footerLastPost   = $footerpost->splice(0, 1);



        return view('website.home', compact(['allPost', 'firstPost', 'middlePost', 'lastPost', 'footerFirstPost', 'footerMiddlePost', 'footerLastPost']));
    }

    public function about()
    {
        return view('website.about');
    }

    // show post by category
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if($category){
            $post = post::where('category_id', $category->id)->paginate(3);
            return view('website.category', compact(['category', 'post']));

        }else return redirect()->route('website.index');

    }
    // show post by tag page
    public function tag($slug)
    {
        $tags = tag::where('slug', $slug)->first();
       
        if($tags){
        $post = $tags->posts()->orderBy('created_at', 'desc')->paginate(9);
        return view('website.tag', compact(['tags', 'post']));

        }else return redirect()->route('website.index');

    }


    public function contact()
    {
        return view('website.contact');
    }
    public function post($slug)
    {
        $ppost = post::inRandomOrder()->paginate(3);
        $alltags = tag::orderBy('id', 'desc')->paginate(100);
        $post = post::with('category', 'user', 'tags')->where('slug',$slug)->get();
        $allcategory = Category::orderBy('id', 'desc')->paginate(100);
        $relatedPost = post::orderBy('category_id', 'desc')->inRandomOrder()->paginate(3);
        if($slug){
            return view('website.post', compact(['post', 'alltags', 'allcategory', 'ppost', 'relatedPost']));
        }else{
            return redirect('/');
        }

    }



    
}