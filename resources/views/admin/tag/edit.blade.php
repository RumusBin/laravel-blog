
@extends('admin.layouts.app')
@section('title')
    Изменение тэга
    @endsection
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <a href="{{route('tag.index')}}" class="btn btn-warning">Back</a>
                            <h3 class="box-title">Edit tag {!! $tag->name !!}</h3>
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
                        <form role="form" action="{{route('tag.update', $tag->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Tag name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Tag slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{$tag->slug}}">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Edit tag</button>
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