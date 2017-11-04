<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){

        /** @var collection $posts */
        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(5);
        return view('user/home', ['posts'=>$posts]);
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts();
        return view('user/home', ['posts'=>$posts]);
    }

    public function category(Category $category)
    {
        $posts = $category->posts();
        return view('user/home', ['posts'=>$posts]);
    }
}
