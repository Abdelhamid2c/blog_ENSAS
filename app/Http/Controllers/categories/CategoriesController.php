<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\posts\Category;
use App\Models\posts\PostModel;
use DB;

class CategoriesController extends Controller
{
    public function category($name){
    
        $posts = PostModel::where('category',$name)->take(5)
        ->orderBy('created_at','desc')->get();

        $pubPosts = PostModel::take(3)->orderBy('id','desc')->get();

        $categories = DB::table('categories')
        ->join('posts','posts.category',"=",'categories.name')
        ->select('categories.name as name','categories.id as id',DB::raw('count(posts.category) AS total'))
        ->groupBy('posts.category')
        ->get();

        return view('categories.category',
        compact('posts','pubPosts','categories','name'));

    }
}
