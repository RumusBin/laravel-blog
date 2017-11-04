@extends('admin.layouts.app')
@section('title')
    Все теги блога
    @endsection
@section('main-content')

    <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tags
                <small>list</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Tag list</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-header">
                            <a href="{{route('tag.create')}}" class="btn btn-success">Create tag</a>
                            <h3 class="box-title">All tags</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($tags))
                                    @foreach($tags as $tag)
                                        <tr>
                                    <th>{{$tag->name}}</th>
                                    <th>{{$tag->slug}}</th>
                                    <th>
                                        <a href="{{route('tag.edit', ['id'=>$tag->id])}}" class="btn btn-success" id="tag_edit" title="Edit this tag">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="" class="btn btn-danger" id="destroy_tag" title="Delete this tag"
                                           onclick="
                                                   if(confirm('Вы действительно хотите удалить этот Tag?'))
                                                   {
                                                   event.preventDefault(); document.getElementById('delete-form-{{$tag->id}}').submit()
                                                   }"
                                        >
                                            <span class="glyphicon glyphicon-trash"></span>
                                            <form action="{{route('tag.destroy', $tag->id)}}" method="post" id="delete-form-{{$tag->id}}" style="display: none">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>
                                        </a>
                                    </th>
                                        </tr>
                                    @endforeach
                               @endif

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Options</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->


@endsection
@section('custom.scripts')
    <script>
        $( function() {
            $( "#tag_edit" ).tooltip({
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
            $( "#destroy_tag" ).tooltip({
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