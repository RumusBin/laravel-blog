
@extends('admin.layouts.app')
@section('title')
    Создание новой роли админа
    @endsection
@section('main-content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <a href="{{route('tag.index')}}" class="btn btn-warning">Назад</a>
                            <h3 class="box-title">Создание новой роли</h3>
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                @endforeach
                            @endif
                            @include('templates.includes.messages.flash')
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>

                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('roles.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">

                                    <div class="form-group">
                                        <label for="name">Название роли</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Название роли">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="posts_permissions">Posts permitions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'post')
                                            <div class="checkbox">
                                                <label><input id="post_permissions" type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->name}}</label>
                                            </div>
                                            @endif
                                         @endforeach
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="user_permitions">Users permitions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'user')
                                                <div class="checkbox">
                                                    <label><input name="permissions[]" id="post_permissions" type="checkbox" value="{{$permission->id}}">{{$permission->name}}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="other_permitions">Other permitions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'other')
                                                <div class="checkbox">
                                                    <label><input name="permissions[]" id="other_permissions" type="checkbox" value="{{$permission->id}}">{{$permission->name}}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="box-footer col-lg-8 col-lg-offset-4">
                                    <button type="submit" class="btn btn-primary">Создать</button>
                                </div>
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