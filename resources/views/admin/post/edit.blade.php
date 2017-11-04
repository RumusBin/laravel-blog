
@extends('admin.layouts.app')
@section('page_styles')

<link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.css')}}">
@endsection
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
                        <form role="form" action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select tags for post</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a tags" style="width: 100%;" name="tags[]">
                                            @foreach($tags as $tag)
                                            <option value="{{$tag->id}}"
                                                @foreach($post->tags as $postTag)
                                                    @if($postTag->id == $tag->id)
                                                        selected
                                                    @endif
                                                @endforeach
                                            >{!! $tag->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select category</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a category" style="width: 100%;" name="categories[]">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @foreach($post->categories as $postCategory)
                                                    @if($postCategory->id == $category->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                            >{!! $category->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="pull-right">
                                            <label for="exampleInputFile">Image</label>
                                            <input type="file" name="image" id="exampleInputFile">
                                        </div>
                                        <img class="pull-right" src="{{$post->image}}" alt="post_#{{$post->id}}_image" style="max-width: 200px">
                                        <input type="hidden" value="{{$post->image}}" name="imgOld">
                                        <div class="checkbox pull-left">
                                            <label>
                                                <input type="checkbox"  name="status" value="1"
                                                @if($post->status == 1)
                                                    checked
                                                    @endif
                                                > Publish
                                            </label>
                                        </div>
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

                                    <textarea id="editor1" class="textarea" name="body" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {!! $post->body !!}
                                    </textarea>

                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Edit post</button>
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
@section('page_scripts')
    <script src="{{asset('admin/plugins/select2/select2.full.js')}}"></script>
    <script>
        $('document').ready(function () {
            $('.select2').select2();
        })
    </script>
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
        });
    </script>
@endsection