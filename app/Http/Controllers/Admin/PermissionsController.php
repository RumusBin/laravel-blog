<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $permissions = Permission::all();
     return view('admin.permissions.index', ['permissions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.permissions.create');
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
            'name'=>'required|max: 50|unique:permissions',
            'for'=>'required'
        ]);
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();
        return redirect(route('permission.index'))->with('message', 'Привеления создана!');
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
        $permission = Permission::find($id);
        return view('admin.permissions.edit', ['permission'=>$permission]);
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
        $this->validate($request, [
            'name'=>'required|max:50',
            'for'=>'required'
        ]);
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();
        return redirect(route('permission.index'))->with('message', 'Привеления изменена! ');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::where('id', $id)->delete();
        return redirect()->back()->with('message', 'ПРивелегия удалена!');
    }
}
