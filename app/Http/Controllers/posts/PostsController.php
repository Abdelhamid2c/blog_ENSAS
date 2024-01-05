<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\posts\PostModel;
use App\Models\posts\Comment;
use App\Models\User;
use DB;
use Auth;


class PostsController extends Controller

{

    public function index() {
        $posts = PostModel::all()->take(2);
        $postOne = PostModel::take(1)->orderBy('id','desc')->get();
        $postTwo = PostModel::take(2)->orderBy('title','desc')->orderBy('created_at','desc')->get();

        //afficher business section 
        $postsBus = PostModel::where('category','Business')->take(2)->orderBy('created_at','desc')->get();
        $postsBusTree = PostModel::where('category','Business')->take(3)->orderBy('title','desc')->get();

        $randomPosts = PostModel::take(4)->orderBy('category','desc')->get();

        $PostsCulture = PostModel::where('category','Culture')->take(2)->orderBy('created_at','desc')->get();
        $PostsCultureTwo = PostModel::where('category','Culture')->take(3)->orderBy('created_at','desc')->get();

        $PostsPolitics = PostModel::where('category','Politics')->take(9)->orderBy('id','desc')->get();

        $PostsTravel = PostModel::where('category','Travel')->take(1)->orderBy('title','desc')->get();
        $PostsTravelOne = PostModel::where('category','Travel')->take(1)->orderBy('created_at','desc')->get();
        $PostsTravelTwo = PostModel::where('category','Travel')->take(1)->orderBy('description','desc')->get();




        return view('posts.index', 
        compact('posts','postOne','postTwo','postsBus','postsBusTree','randomPosts','PostsCulture','PostsCultureTwo','PostsPolitics','PostsTravel','PostsTravelOne','PostsTravelTwo'));

    }

    public function single($id)  {
       $single = PostModel::find($id);
       $user = User::find($single->user_id);

       $pubPosts = PostModel::take(3)->orderBy('id','desc')->get();

       $categories = DB::table('categories')
       ->join('posts','posts.category',"=",'categories.name')
       ->select('categories.name as name','categories.id as id',DB::raw('count(posts.category) AS total'))
       ->groupBy('posts.category')
       ->get();

       $comments = Comment::where('post_id',$id)->get();
       $commentNum = $comments->count();

       //print_r($comments);

        $moreBlogs = PostModel::where('category',$single->category)
        ->where('id', '!=',$id)->take(4)->get();



       return view('posts.single',
       compact('single','user','pubPosts','categories','comments','moreBlogs','commentNum'));
    }

    public function storeComment(Request $request){

        $insertComment = Comment::create([ 
            "comment" => $request->comment,
            "user_id" => Auth::user()->id,
            "user_name" => Auth::user()->name,
            "post_id" => $request->post_id,
           ]);
           return redirect('/posts/single/'.$request->post_id.'')->with('success','Comment inserted succefuly');
    }

    public function CreatePost(){

      if(auth()->user()){
        return view('posts.create-post');

      }else{
        return abort('404');
      }
    }

    public function storePost(Request $request){

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);


        $insertPost = PostModel::create([ 
            "title" => $request->title,
            "category" => $request->category,
            "user_id" => Auth::user()->id,
            "user_name" => Auth::user()->name,
            "description" => $request->Description,
            "image" => $myimage ,
           ]);

           
           return redirect('/posts/create-post'.$request->post_id.'')->with('success','Post Inserted succefuly');
      }

      public function deletePost($id){
        
        $deletepost = PostModel::find($id);
        $deletepost->delete();

        return redirect('/posts/index')->with('deleted','Post deleted');

      }

      public function editPost($id){

        $single = PostModel::find($id);
        if(auth()->user()){
          if(Auth::user()->id == $single->user_id){
            return view("posts.edit-post",
            compact('single'));
          }else{
              return abort('404');
          }
        }
        


      }

      public function updatePost(Request $request, $id){
        $post = PostModel::find($id);


         $post->category = $request->input('category');
         $post->title = $request->input('title');
         $post->description = $request->input('Description');

         $post->save();

        if($post){
            return redirect('/posts/single/'.$id.'')->with('updated','Post updated');
        }


        return view("posts.edit-post",
        compact('single'));
      }

      public function contact(){

        return view('pages.contact');
      }

      public function about(){

        return view('pages.about');
      }

      public function Search(Request $request){

        $search = $request->get('search');
        // print($search);
        $results = PostModel::select()->where('title','like',"%$search%")->get();
        return view("posts.search", compact('results'));
      }

      

}
