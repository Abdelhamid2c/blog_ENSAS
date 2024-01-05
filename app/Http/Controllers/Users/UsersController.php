<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\posts\PostModel;
use Auth;

class UsersController extends Controller
{
    public function  editProfile($id) {
        $user = User::find($id);
        if(auth()->user()){
            if(Auth::user()->id == $user->id){
                return view('users.update-profile',
                compact('user'));
            }else{
                return abort('404');
              }
    
          }else{
            return abort('404');
          }
      
    }

    public function updateprofile(Request $request ,$id){
        
         $user = User::find($id);

         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->description = $request->input('description');

         if($request->image){
            $destinationPath = 'user_images/';
            $myimage = $request->image->getClientOriginalName();
            $request->image->move(public_path($destinationPath), $myimage);
   
            $user->image = $myimage;
         }

         $user->save();
        
        

         if($user){
             return redirect('posts/index')->with('updated.user','user info updated');
         }

         return view("posts.edit-post",
          compact('single'));
          //  print($user);
        //  print("     ");
        //  print_r($request->all());
        // Request()->validate([
        //     'name' => 'required | max:20',
        //     'email' => 'required ',
        //     'bio' => 'required | max:100'
        // ]);

        //$user->update($request->all());
    }

    public function Profile($id){
        $profile = User::find($id);
        $latestPosts = PostModel::where("user_id",$id)->take(4)->orderBy('created_at','desc')->get();

         return view("users.profile",
         compact('profile','latestPosts'));
    }
}
