<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Zizi</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Posts</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('post.index')}}"><i class="fa fa-circle-o"></i> All posts</a></li>
                    <li><a href="{{route('tag.index')}}"><i class="fa fa-circle-o"></i>Tags</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{route('category.index')}}">
                    <i class="fa fa-dashboard"></i> <span>Categories</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> All categories</a></li>
                </ul>
            </li>
            @can('admins.create', Auth::user())
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Админы</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('admins.list')}}"><i class="fa fa-circle-o"></i>Спсиок админов</a></li>
                    <li class="active"><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i>Роли админов</a></li>
                    <li class="active"><a href="{{route('permission.index')}}"><i class="fa fa-circle-o"></i>Привелегии</a></li>
                </ul>
            </li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>