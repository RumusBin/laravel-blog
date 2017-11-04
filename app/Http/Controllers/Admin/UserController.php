<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admins.create');
        $this->middleware('can:admins.update');
        $this->middleware('can:admins.delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.users.admins_list', ['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.admin_create', ['roles'=>$roles]);
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
            'name'=>'required|string|max:20',
            'email'=>'required|string|email|unique:admins',
            'password'=>'required|min:6|confirmed'
        ]);

        $request['password'] = bcrypt($request->password);
        $admin=Admin::create($request->all());
        $admin->roles()->sync($request->roles);
        return redirect(route('admin.home'));
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
        //get all roles from DB to assign on admin
        $data['roles'] = Role::all();
        //find admin
        $data['admin'] = Admin::find($id);

        return view('admin.users.admin_edit', $data);
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
//        dd($request->roles);
        $this->validate($request, [
            'name'=>'required|string|max:20',
            'email'=>'required|string|email'
        ]);
        $request['status']=$request->status??$request['status']=0;
      $admin = Admin::where('id',$id)->update($request->except('_token', '_method', 'roles'));
        Admin::find($id)->roles()->sync($request->roles);
      return redirect(route('users.index'))->with('message', 'Админ обновленн!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return redirect()->back()->with('message', 'Админ успешно удален!');
    }
}
