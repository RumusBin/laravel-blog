
@extends('admin.layouts.app')
@section('title')
    Создание новой привелегии
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
                            <h3 class="box-title">Создать привелегию</h3>
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
                        <form role="form" action="{{route('permission.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">

                                    <div class="form-group">
                                        <label for="name">Название привелегии</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Название привелегии">
                                    </div>
                                    <div class="form-group">
                                        <label for="for">Привелегии для...</label>
                                        <select type="text" class="form-control" id="for" name="for">
                                            <option value="post">Post</option>
                                            <option value="user">User</option>
                                            <option value="other">Other</option>
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