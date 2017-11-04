<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

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
        return $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(5);
    }
}
