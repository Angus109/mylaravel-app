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
      <li class="{{ Request::is('admin/cms') ? 'active' : '' }}">
        <a href="{{route('cms.index')}}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview {{ Request::is('cms/activie-promo') || Request::is('cms/add-new-promo')  || Request::is('cms/closed-promo') || Request::is('cms/all-promos') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i>
          <span>Promotions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('cms/add-new-promo') ? 'active' : '' }}"><a href="{{route('cms.addpromo')}}"><i class="fa fa-angle-double-right"></i>Add Promo</a></li>
            <li class="{{ Request::is('cms/all-promos') ? 'active' : '' }}"><a href="{{route('cms.promos')}}"><i class="fa fa-angle-double-right"></i>All Promos</a></li>
          <li class="{{ Request::is('cms/activie-promo') ? 'active' : '' }}"><a href="{{ route('cms.activepromo') }}"><i class="fa fa-angle-double-right"></i>Active Promos</a></li>
          <li class="{{ Request::is('cms/closed-promo') ? 'active' : '' }}"><a href="{{route('cms.closedpromo')}}"><i class="fa fa-angle-double-right"></i>Closed Promos</a></li>
        </ul>
      </li>
      <li class="treeview {{ Request::is('cms/pending-task') || Request::is('cms/users-task')  || Request::is('cms/approved-task') || Request::is('cms/declined-tasks') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>User Tasks</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('cms/pending-task') ? 'active' : '' }}"><a href="{{route('cms.pendingtasks')}}"><i class="fa fa-angle-double-right"></i>Pending Tasks</a></li>
            <li class="{{ Request::is('cms/approved-task') ? 'active' : '' }}"><a href="{{route('cms.approvedtasks')}}"><i class="fa fa-angle-double-right"></i>Approved Tasks</a></li>
          <li class="{{ Request::is('cms/declined-tasks') ? 'active' : '' }}"><a href="{{ route('cms.declinedtasks') }}"><i class="fa fa-angle-double-right"></i>Declined Tasks</a></li>
          <li class="{{ Request::is('cms/users-task') ? 'active' : '' }}"><a href="{{route('cms.usertask')}}"><i class="fa fa-angle-double-right"></i>All Tasks</a></li>
        </ul>
      </li>
      <li class="treeview {{ Request::is('cms/withdrawer-requests') || Request::is('cms/paid-withdrawer-requests')  || Request::is('cms/user-sent-history') || Request::is('cms/user-receive-history') || Request::is('cms/all-user-balances') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-money"></i>
          <span>Transactions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('cms/withdrawer-requests') ? 'active' : '' }}"><a href="{{route('cms.withdrawerrequests')}}"><i class="fa fa-angle-double-right"></i>Pending Withdrawer Requests</a></li>
            <li class="{{ Request::is('cms/paid-withdrawer-requests') ? 'active' : '' }}"><a href="{{route('cms.paidwithdrawers')}}"><i class="fa fa-angle-double-right"></i>Paid Withdrawer Requests</a></li>
            <li class="{{ Request::is('cms/user-sent-history') ? 'active' : '' }}"><a href="{{route('cms.senthistory')}}"><i class="fa fa-angle-double-right"></i>User Sent History</a></li>
            <li class="{{ Request::is('cms/user-receive-history') ? 'active' : '' }}"><a href="{{route('cms.receivehistory')}}"><i class="fa fa-angle-double-right"></i>Users Receive History </a></li>
            <li class="{{ Request::is('cms/all-user-balances') ? 'active' : '' }}"><a href="{{ route('cms.userbalances') }}"><i class="fa fa-angle-double-right"></i>All User Balances</a></li>
        </ul>
      </li>
      
      
      
      <li class="treeview {{ Request::is('cms/all-users') || Request::is('cms/unverified-users')  || Request::is('cms/closed-promo') || Request::is('cms/verified-users') || Request::is('cms/proofofpaymentusers') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('cms/all-users') ? 'active' : '' }}"><a href="{{route('cms.allusers')}}"><i class="fa fa-angle-double-right"></i>All Users</a></li>
            <li class="{{ Request::is('cms/verified-users') ? 'active' : '' }}"><a href="{{route('cms.verifiedusers')}}"><i class="fa fa-angle-double-right"></i>Verified Users</a></li>
            <li class="{{ Request::is('cms/unverified-users') ? 'active' : '' }}"><a href="{{ route('cms.unverifiedusers') }}"><i class="fa fa-angle-double-right"></i>Unverified Users</a></li>
            <li><hr style="margin:5px;"></li>
            <li class="{{ Request::is('cms/proofofpaymentusers') ? 'active' : '' }}"><a href="{{ route('cms.proofofpaymentusers') }}"><i class="fa fa-angle-double-right"></i>Proof Of Payment</a></li>
            <li class="{{ Request::is('cms/proofofpaymentusersaccepted') ? 'active' : '' }}"><a href="{{ route('cms.proofofpaymentusersaccepted') }}"><i class="fa fa-angle-double-right"></i>Payment(s) <span class="btn btn-sm btn-success">Accepted</span></a></li>
            <li class="{{ Request::is('cms/proofofpaymentusersrejected') ? 'active' : '' }}"><a href="{{ route('cms.proofofpaymentusersrejected') }}"><i class="fa fa-angle-double-right"></i>Payment(s) <span class="btn btn-sm btn-danger">Rejected</span></a></li>
            <li><hr style="margin-top:5px; margin-bottom:15px;"></li>
        </ul>
      </li>
      
      
      
      <li class="{{ Request::is('cms/influencers-requests') ? 'active' : '' }}">
        <a href="{{route('cms.influencers')}}">
          <i class="fa fa-save"></i> <span>Influencers Requests</span>
        </a>
      </li>
      <li class="{{ Request::is('cms/advert-payments') ? 'active' : '' }}">
        <a href="{{route('cms.advertpayments')}}">
          <i class="fa fa-money"></i> <span>Advert Payments</span>
        </a>
      </li>
      <li class="{{ Request::is('cms/contact') ? 'active' : '' }}">
        <a href="{{route('cms.contact')}}">
          <i class="fa fa-save"></i> <span>Contact Us</span>
        </a>
      </li>
      <li class="{{ Request::is('cms/sitesettings') ? 'active' : '' }}">
        <a href="{{route('cms.settings')}}">
          <i class="fa fa-cogs"></i> <span>System Config</span>
        </a>
      </li>
      
      @if(

        \Auth::user()->role->permission->user_module == "yes")
      <li class="treeview {{ Request::is('cms/users/index') || Request::is('cms/user/roles')  ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-user"></i>
          <span>User Config</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('cms/users/index') ? 'active' : '' }}"><a href="{{route('cms.users.index')}}"><i class="fa fa-angle-double-right"></i>All Users</a></li>
          <li><a href="{{route('cms.user.roles')}}"><i class="fa fa-angle-double-right"></i>All Roles</a></li>
        </ul>
      </li>
      @endif
      <li>
        <a href="{{url('/')}}">
          <i class="fa fa-globe"></i> <span>Main Website</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.logout') }}">
          <i class="fa fa-power-off"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
  </section>
