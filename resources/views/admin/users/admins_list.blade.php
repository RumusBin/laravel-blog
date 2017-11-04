@extends('admin.layouts.app')
@section('title')
    Спсиок админов
    @endsection
@section('main-content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Админы
            <small>все зарегистрированные</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Список админов</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <a href="{{route('users.create')}}" class="btn btn-success">Создать админа</a>
                        <h3 class="box-title">Все админы</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Роли</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($admins))
                                @foreach($admins as $admin)
                                    <tr>
                                        <th>{{$admin->id}}</th>
                                        <th>{{$admin->name}}</th>
                                        <th>
                                            {{--admins roles--}}
                                            @foreach($admin->roles as $role)
                                            {{$role->name}},
                                            @endforeach
                                        </th>
                                        <th>
                                            @if($admin->status == 1)
                                                <span style="color: #00a65a">Active</span>
                                            @else
                                                <span style="color: rgba(227,22,0,0.89)">Not active</span>
                                            @endif
                                        </th>
                                        <th>
                                            <a href="{{route('users.edit', $admin->id)}}" class="btn btn-success" id="admin_edit" title="Edit this admin">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="" class="btn btn-danger" id="destroy_admin" title="Delete this admin"
                                               onclick="
                                                       if(confirm('Вы действительно хотите удалить этот admin?'))
                                                       {
                                                       event.preventDefault(); document.getElementById('delete-form-{{$admin->id}}').submit()
                                                       }"
                                          >
                                                <span class="glyphicon glyphicon-trash"></span>
                                                <form action="{{route('users.destroy', $admin->id)}}" method="post" id="delete-form-{{$admin->id}}" style="display: none">
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
                                <th>Роли</th>
                                <th>Статус</th>
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