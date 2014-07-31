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

    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
       <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>

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
        <a href="#">
          <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-calendar"></i> <span>Calendar</span>
          <small class="badge pull-right bg-red">3</small>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <small class="badge pull-right bg-yellow">12</small>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>