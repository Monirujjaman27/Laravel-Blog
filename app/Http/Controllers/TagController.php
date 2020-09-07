<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Session;
use App\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTags = Tag::orderBy('created_at', 'DESC')->paginate(20);
      return view('admin.tags.index', compact('allTags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.tags.addTags');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //validation
       $validData = $this->validate($request,[
        'name' => 'required|unique:categories,name',
    ]);

    $tag = Tag::create([
       'name' => ucfirst($request->name),
       'slug' => str::slug($request->name, '-'),
       'description' => $request->description,
    ]);
    Session::flash('success', 'tag added successfully');
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {
       return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tag $tag)
    {
        $validData = $this->validate($request,[
            'name' => 'required|unique:tags,name,$tag->name',
            ]);
        
            $tag->name =ucfirst($request->name);
            $tag->slug = str::slug($request->name, '-');
            $tag->description = $request->description;
            $tag->save();
        
            Session::flash('success', 'Tag Updated successfully');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        if($tag){
            $tag->delete();
            Session::flash('success', 'Tag Deleted successfully');
            return redirect()->route('tag.index');

       }
    }
}