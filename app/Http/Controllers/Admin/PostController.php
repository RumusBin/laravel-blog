<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

use File;

class PostController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = new Post;
        return view('admin.post.index', ['posts'=>$posts->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.post', ['categories'=>$categories, 'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title'=>'required',
            'image' => 'mimes:jpeg,jpg,png,PNG',
        ]);
        $post = new Post;
        $imagePath = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = 'post_of_'.time().'_'.$image->getClientOriginalName();

            $image->move('images/posts', $imageName);
            $imagePath = '/images/posts/'.$imageName;
        }else{
            $imagePath = '/images/no-image.png';
        }
        $post->image = $imagePath;
        $post->title = $request->input('title');
        $post->sub_title = $request->input('sub_title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->status = $request->input('status');
        $post->save();
        $post->categories()->sync($request->input('categories'));
        $post->tags()->sync($request->input('tags'));

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.post.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::with('tags', 'categories')->find( $id);
        return view('admin.post.edit', ['post'=>$post, 'categories'=>$categories, 'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
        $post = Post::find($id);
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        $imagePath = '';
        if($request->hasFile('image')){
           $image = $request->file('image');
           $imageName = 'post_of_'.time().'_'.$image->getClientOriginalName();
            $image->move('images/posts', $imageName);
            $imagePath = '/images/posts/'.$imageName;
            //deleting old files
            File::delete(public_path().$request->imgOld);
        }else{
            $imagePath = $request->imgOld;
        }

        $post->image = $imagePath;
        $post->title = $request->input('title');
        $post->sub_title = $request->input('sub_title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->status = $request->input('status');
        $post->save();
        return redirect(route('post.index'))->with('success', 'Post was successful creating!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
}
