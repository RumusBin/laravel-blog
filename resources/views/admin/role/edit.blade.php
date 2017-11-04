
@extends('admin.layouts.app')
@section('title')
    Изменение роли
@endsection
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <a href="{{route('roles.index')}}" class="btn btn-warning">Назад</a>
                            <h3 class="box-title">Edit role {!! $role->name !!}</h3>
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('roles.update', $role->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="name">Role name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="posts_permissions">Posts permitions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'post')
                                                <div class="checkbox">
                                                    <label><input name="permissions[]" id="post_permissions" type="checkbox"
                                                                  @foreach($role->permissions as $role_permit)
                                                                          @if($role_permit->id == $permission->id)
                                                                          checked
                                                                          @endif
                                                                   @endforeach
                                                     value="{{$permission->id}}">{{$permission->name}}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="user_permitions">Users permitions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'user')
                                                <div class="checkbox">
                                                    <label><input name="permissions[]" id="post_permissions"
                                                                  @foreach($role->permissions as $role_permit)
                                                                  @if($role_permit->id == $permission->id)
                                                                  checked
                                                                  @endif
                                                                  @endforeach
                                                                  type="checkbox" value="{{$permission->id}}">{{$permission->name}}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="other_permitions">Other permitions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'other')
                                                <div class="checkbox">
                                                    <label><input name="permissions[]"
                                                                  @foreach($role->permissions as $role_permit)
                                                                  @if($role_permit->id == $permission->id)
                                                                  checked
                                                                  @endif
                                                                  @endforeach
                                                                  id="other_permissions" type="checkbox" value="{{$permission->id}}">{{$permission->name}}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Edit role</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>

@endsection