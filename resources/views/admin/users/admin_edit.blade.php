@extends('admin.layouts.app')
@section('title')
    Изменение админа
@endsection
@section('main-content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <a href="{{route('users.index')}}" class="btn btn-warning">Back</a>
                            <h3 class="box-title">Изменение админа</h3>
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                @endforeach
                            @endif
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('users.update', $admin->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">

                                    <div class="form-group">
                                        <label for="name">Имя админа</label>
                                        <input type="text" class="form-control" id="name" name="name" value="@if(old('name')){{old('name')}}@else{{$admin->name}}@endif" >
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="@if(old('email')){{old('email')}}@else{{$admin->email}}@endif" >
                                    </div>

                                    <div class="form-group">
                                        <label for="user_status">Статус</label>
                                        <div class="checbox">
                                            <input type="checkbox" id="user_status" name="status"
                                                   @if($admin->status == 1)
                                                           checked
                                                    @endif
                                                   value="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Роль админа</label>
                                            @foreach($roles as $role)
                                                <div class="checkbox">
                                                    <label><input name="roles[]" type="checkbox" id="role"
                                                        @foreach($admin->roles as $admin_role)
                                                                @if($admin_role->id == $role->id)
                                                                    checked
                                                                @endif
                                                        @endforeach
                                                     value="{{$role->id}}">{{$role->name}}</label>
                                                </div>
                                            @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->

                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
    </div>

@endsection