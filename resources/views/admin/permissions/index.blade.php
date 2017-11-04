@extends('admin.layouts.app')
@section('title')
    Привелегии
@endsection
@section('main-content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Привелегии
            <small>список существующих</small>
        </h1>
        @include('templates.includes.messages.flash')
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Доступные привелегии</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <a href="{{route('permission.create')}}" class="btn btn-success">Создать привелегию</a>
                        <h3 class="box-title">Все привелегии</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Для</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($permissions))
                                @foreach($permissions as $permission)
                                    <tr>
                                        <th>{{$permission->id}}</th>
                                        <th>{{$permission->name}}</th>
                                        <th>{{$permission->for}}</th>
                                        <th>
                                            <a href="{{route('permission.edit', ['id'=>$permission->id])}}" class="btn btn-success" id="permission_edit" title="Изменить привелегию">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="" class="btn btn-danger" id="destroy_role" title="Удалить привелегию"
                                               onclick="
                                                       if(confirm('Вы действительно хотите удалить эту роль?'))
                                                       {
                                                       event.preventDefault(); document.getElementById('delete-form-{{$permission->id}}').submit()
                                                       }"
                                            >
                                                <span class="glyphicon glyphicon-trash"></span>
                                                <form action="{{route('permission.destroy', $permission->id)}}" method="post" id="delete-form-{{$permission->id}}" style="display: none">
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
                                <th>#</th>
                                <th>Имя</th>
                                <th>Для</th>
                                <th>Действия</th>
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