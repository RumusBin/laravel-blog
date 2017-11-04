@extends('admin.layouts.app')
@section('title')
    Роли администраторов блога
@endsection
@section('main-content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Роли
            <small>список существующих</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Доступные роли админов</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <a href="{{route('roles.create')}}" class="btn btn-success">Создать роль</a>
                        <h3 class="box-title">Все роли</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($roles))
                                @foreach($roles as $role)
                                    <tr>
                                        <th>{{$role->id}}</th>
                                        <th>{{$role->name}}</th>
                                        <th>
                                            <a href="{{route('roles.edit', ['id'=>$role->id])}}" class="btn btn-success" id="role_edit" title="Изменить роль">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="" class="btn btn-danger" id="destroy_role" title="Удалить роль"
                                               onclick="
                                                       if(confirm('Вы действительно хотите удалить эту роль?'))
                                                       {
                                                       event.preventDefault(); document.getElementById('delete-form-{{$role->id}}').submit()
                                                       }"
                                            >
                                                <span class="glyphicon glyphicon-trash"></span>
                                                <form action="{{route('roles.destroy', $role->id)}}" method="post" id="delete-form-{{$role->id}}" style="display: none">
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