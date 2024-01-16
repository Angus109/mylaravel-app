<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="image">
        <img src="{{asset('../images/download.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <a href="{{route('cms.index')}}"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{route('dashboard')}}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
    <li class="{{ Request::is('dashboard/daily-task') ? 'active' : '' }}">
        <a href="{{route('dashboard.dailytask')}}">
          <i class="fa fa-check-circle"></i> <span>Daily Task</span>
                      <span class="pull-right-container">
              <small class="label pull-right bg-danger">{{$task}}</small>
            </span>
        </a>
      </li>
    <li class="{{ Request::is('dashboard/noticeboard') || Request::is('dashboard/noticeboard.details') ? 'active' : '' }}">
        <a href="{{route('noticeboard')}}">
          <i class="fa fa-bullhorn"></i> <span>Notifications</span>
        </a>
      </li>
                <li class="{{ Request::is('dashboard/all-task') ? 'active' : '' }}">
        <a href="{{route('dashboard.alltasks')}}">
          <i class="fa fa-cubes"></i> <span>All My Tasks</span>
        </a>
      </li>
        <li class="{{ Request::is('dashboard/become-promoter') ? 'active' : '' }}">
        <a href="{{route('dashboard.promoter')}}">
          <i class="fa fa-handshake-o"></i> <span>Become a Promoter</span>
        </a>
      </li>
          <li class="{{ Request::is('dashboard/support') ? 'active' : '' }}">
        <a href="{{route('dashboard.contact')}}">
          <i class="fa fa-phone"></i> <span>Support</span>
        </a>
      </li>
    <li class="{{ Request::is('dashboard/profile') ? 'active' : '' }}">
        <a href="{{route('profile')}}">
          <i class="fa fa-cogs"></i> <span>My Profile</span>
        </a>
      </li>

      <li>
        <a href="{{url('/')}}">
          <i class="fa fa-globe"></i> <span>Main Website</span>
        </a>
      </li>
      <li>
        <a href="{{ route('logout') }}">
          <i class="fa fa-power-off"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
  </section>
