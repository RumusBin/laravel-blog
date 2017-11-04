<!DOCTYPE html>
<html>
<head>
   @include('admin.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    @include('admin.layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.main_sidebar')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

  @section('main-content')
        @show
    </div>
    <!-- /.content-wrapper -->
    @include('admin.layouts.footer')

   @include('admin.layouts.control_sidebar')
</div>
<!-- ./wrapper -->

@include('admin.layouts.main_scripts')
</body>
</html>
