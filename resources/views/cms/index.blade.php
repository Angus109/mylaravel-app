@extends('layouts.admin')
@section('title')
    Home
@endsection
@section('content')

<section class="content">
    <div class="row">

      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="ion ion-ios-chatbubble-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Messages</span>
            <span class="info-box-number">{{$messages}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$messages}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-cubes"></i></span>

          <div class="info-box-content">
            <span class="info-box-text" title="Transer Transactions">Transer Transactions</span>
            <span class="info-box-number">{{$transcont}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$transcont}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-pie-chart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">User Task</span>
            <span class="info-box-number">{{$faircnt}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$faircnt}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-envelope"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Promotions</span>
            <span class="info-box-number">{{$eventcnt}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$eventcnt}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text" title="Join Influencers">Join Influencers</span>
            <span class="info-box-number">{{$influencercnt}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$influencercnt}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="ion ion-person-stalker"></i></span>

          <div class="info-box-content">
            <span class="info-box-text" title="Verified Users">Verified Users</span>
            <span class="info-box-number">{{$users}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$users}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="ion ion-bag"></i></span>

          <div class="info-box-content">
            <span class="info-box-text" title="Submitted Tasks">Submitted Tasks</span>
            <span class="info-box-number">{{$tasksubmitcnt}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$tasksubmitcnt}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-bullhorn"></i></span>

          <div class="info-box-content">
            <span class="info-box-text" title="Wallet Transactions">Wallet Transactions</span>
            <span class="info-box-number">{{$wallcont}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$wallcont}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-md-12 connectedSortable">

        <!-- Calendar -->
        <div class="box box-solid bg-blue-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Calendar</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <!-- button with a dropdown -->
              <div class="btn-group">
                <button type="button" class="btn btn-blue btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Add new event</a></li>
                  <li><a href="#">Clear events</a></li>
                  <li class="divider"></li>
                  <li><a href="#">View calendar</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-black">
            <div class="row">
              <div class="col-sm-6">
                <!-- Progress bars -->

              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.box -->

      </div>

    </div>


    <!-- /.row (main row) -->

  </section>


@endsection


