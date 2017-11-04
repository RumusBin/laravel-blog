
@extends('admin.layouts.app')
@section('title')
    Создать нового админа
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
                            <h3 class="box-title">Новый админ</h3>
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
                        <form role="form" action="{{route('users.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">

                                    <div class="form-group">
                                        <label for="title">Имя админа</label>
                                        <input type="text" class="form-control" id="title" name="name" value="{{old('name')}}" placeholder="Enter tag name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" value="{{old('email')}}" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Пароль </label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Пароль еще раз</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_status">Статус</label>
                                        <div class="checbox">
                                            <input type="checkbox" id="user_status" name="status" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Роль админа</label>
                                        <select class="form-control" id="roles" name="roles[]" multiple>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
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