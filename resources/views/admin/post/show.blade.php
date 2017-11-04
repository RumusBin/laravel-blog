@extends('admin.layouts.app')
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <a href="{{route('post.index')}}" class="btn btn-warning">Back</a>
                            <h3 class="box-title">Edit post</h3>


                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('post.edit')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Post title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_title">Sub title</label>
                                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$post->sub_title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <input type="file" name="image" id="exampleInputFile">

                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"  name="status"> Publish
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Write youre post here
                                        <small>Simple and fast</small>
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>

                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">

                                    <textarea class="textarea" name="body" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection