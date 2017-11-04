@extends('admin.layouts.app')
@section('custom_styles')
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection
@section('main-content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories
            <small>list</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Categories list</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                            <a href="{{route('category.create')}}">
                                <button type="button" class="btn btn-success">Create category</button>
                            </a>
                        <h3 class="box-title">All categories</h3>
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
                            @if(count($categories)>0)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td >
                                                <a href="{{route('category.edit', $category->id)}}" class="btn btn-success post_edit" title="Edit this category">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                <a href="" class="btn btn-danger destroy_post"  title="Delete this category" onclick="
                                                        if(confirm('Вы действительно хотите удалить этоу категорию?'))
                                                        {
                                                        event.preventDefault(); document.getElementById('delete-form-{{$category->id}}').submit()
                                                        }">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                                <form action="{{route('category.destroy', $category->id)}}" method="post" id="delete-form-{{$category->id}}" style="display: none">
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