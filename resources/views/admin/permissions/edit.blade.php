
@extends('admin.layouts.app')
@section('title')
    Изменение превилегии
@endsection
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <a href="{{route('permission.index')}}" class="btn btn-warning">Назад</a>
                            <h3 class="box-title">Edit role {!! $permission->name !!}</h3>
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                @endforeach
                            @endif
                            @include('templates.includes.messages.flash')
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('permission.update', $permission->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="name">Permission name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$permission->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="for">Привелегии для...</label>
                                        <select type="text" class="form-control" id="for" name="for">
                                            <option value="post"
                                                    @if($permission->for=='post')
                                                    selected
                                                    @endif
                                            >Post</option>
                                            <option value="user"
                                                    @if($permission->for=='user')
                                                    selected
                                                    @endif
                                            >User</option>
                                            <option value="other"
                                                    @if($permission->for=='other')
                                                    selected
                                                    @endif
                                            >Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Изменить</button>
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