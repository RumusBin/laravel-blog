
@extends('admin.layouts.app')
@section('main-content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>
                            <h3 class="box-title">Edit category</h3>

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
                        <form role="form" action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Category name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <input type="file" name="image" id="exampleInputFile">

                                        <img src="{{$category->image}}" alt="category_#{{$category->id}}_image" style="max-width: 200px">
                                        <input type="hidden" value="{{$category->image}}" name="imgOld">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Edit category</button>
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

@endsection