<?php

namespace App\Http\Controllers;
use App\Category;
use App\Tag;
use App\Brand;
use App\post;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allpost = post::orderBy('created_at', 'DESC')->paginate(20);
       
        return view('admin.posts.index', compact('allpost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(20);
        $category = Category::orderBy('id', 'desc')->paginate(20);
        return view('admin.posts.addPost', compact(['category', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $this->validate($request,[
            'title'       => 'required|unique:posts,title',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required',
        ]);

        $post = Post::create([
           'title'       => $request->title,
           'image'       => '',
           'slug'        => str::slug($request->title, '-'),
           'description' => $request->description,
           'category_id' => $request->category_id,
           'user_id'     => auth()->user()->id
        ]);
        if($request->has('image')){
            $image = $request->image;
            $newImgName = time().'-'.$image->getClientOriginalName();
            $image->move('storage/post/',$newImgName);
            $post->image = $newImgName;
           $post->save();
        }

        Session::flash('success', 'Post added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete(request $request)
    {
        if($request->has('id')){
            Post::find($request->input('id'))->delete($request->all());
            return ['success' => true, 'message'=>'Delete successfully'];
        }
    }
}
