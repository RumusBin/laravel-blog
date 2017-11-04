@extends('admin.layouts.app')
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        @can('posts.create', Auth::user())
                          <a href="{{route('post.create')}}" class="btn btn-success">Create post</a>
                        @endcan
                        <h3 class="box-title">Post list</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Sub-title</th>
                                <th>Slug</th>
                                <th>Created at:</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($posts)>0)
                                @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->sub_title}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{$post->created_at}}</td>
                                <td >
                                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-success post_edit" title="Edit this post">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="" class="btn btn-danger destroy_post"  title="Delete this post" onclick="
                                            if(confirm('Вы действительно хотите удалить этот пост?'))
                                            {
                                                event.preventDefault(); document.getElementById('delete-form-{{$post->id}}').submit()
                                            }">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <form action="{{route('post.destroy', $post->id)}}" method="post" id="delete-form-{{$post->id}}" style="display: none">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Sub-title</th>
                                <th>Slug</th>
                                <th>Created at:</th>
                                <th>Options</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('custom.scripts')
    <script>
    $( function() {
    $( ".post_edit" ).tooltip({
    show: {
    effect: "slideDown",
    delay: 250
    },
        hide: {
            effect: "explode",
            delay: 250
        }
    });
    } );

    $( function() {
        $( ".destroy_post" ).tooltip({
            show: {
                effect: "slideDown",
                delay: 250
            },
            hide: {
                effect: "explode",
                delay: 250
            }
        });
    } );
    </script>
    @endsection