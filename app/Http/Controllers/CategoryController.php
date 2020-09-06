<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategory = Category::orderBy('created_at', 'DESC')->paginate(20);
      return  view('admin.category.index', compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return  view('admin.category.addCategory');
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

         $category = Category::create([
            'name' => $request->name,
            'slug' => str::slug($request->name, '-'),
            'description' => $request->description,
         ]);
         Session::flash('success', 'Category added successfully');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
     return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
  //validation
     $validData = $this->validate($request,[
    'name' => 'required|unique:categories,name,$category->name',
    ]);

    $category->name = $request->name;
    $category->slug = str::slug($request->name, '-');
    $category->description = $request->description;
    $category->save();

    Session::flash('success', 'Category Updated successfully');
    return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       if($category){
            $category->delete();
            Session::flash('success', 'Category Deleted successfully');
            return redirect()->route('category.index');

       }
    }
}