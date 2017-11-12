<?php

namespace App\Http\Controllers\User;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){


    }

    public function postShow(Post $post)
    {
        return view('user.post', ['post'=>$post]);
    }

    public function getAllPosts()
    {
        return $posts = Post::with('likes')->where('status', 1)->orderBy('created_at', 'desc')->paginate(5);
    }
    public function saveLike(Request $request)
    {
        $likeCheck = Like::where(['user_id'=>Auth::id(), 'post_id'=>$request->id])->first();
        if($likeCheck){
            Like::where(['user_id'=>Auth::id(), 'post_id'=>$request->id])->delete();
            return 'deleted';
        }else{
            $like = new Like;
            $like->user_id = Auth::id();
            $like->post_id = $request->id;
            $like->save();
        }
    }
}
