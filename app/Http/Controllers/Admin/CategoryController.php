<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:posts.categories');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = new Category;

        return view('admin.category.index', ['categories'=>$categories->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'image' => 'mimes:jpeg,jpg,png,PNG',
        ]);
        $category = new Category;
        $imagePath = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = 'post_of_'.time().'_'.$image->getClientOriginalName();

            $image->move('images/categories', $imageName);
            $imagePath = '/images/categories/'.$imageName;
        }else{
            $imagePath = '/images/no-image.png';
        }
        $category->image = $imagePath;
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
        $category = Category::find($id);
        $imagePath = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = 'post_of_'.time().'_'.$image->getClientOriginalName();
            $image->move('images/categories', $imageName);
            $imagePath = '/images/categories/'.$imageName;
            //deleting old files
            File::delete(public_path().$request->imgOld);
        }else{
            $imagePath = $request->imgOld;
        }

        $category->image = $imagePath;
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        return redirect(route('category.index'))->with('success', 'Post was successful creating!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
