<?php

namespace App\Http\Controllers;
use App\Category;
use App\tag;
use App\User;
use App\post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


public function index(){
    $postCount = post::all()->count();
    $categoryCount = Category::all()->count();
    $allpost = post::take(10)->get();
    $tagCount = tag::all()->count();
    $userCount = User::all()->count();
    return view('admin.dashboard.index', compact(['postCount', 'categoryCount', 'tagCount', 'userCount', 'allpost']));
}

}
