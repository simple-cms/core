<aside class="left-side sidebar-offcanvas">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="img/avatar3.png" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>Hello, Jane</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="active">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-envelope"></i> <span>Blog</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('control.post.index') }}"><i class="fa fa-angle-double-right"></i> Posts</a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i> Categories</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('control.page.index') }}">
          <i class="fa fa-file-text"></i> <span>Pages</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>