@extends('layouts.admin')
@section('title')
UnVerified Users
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All UnVerified Users on the platform</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>

          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th class="wd-10p">#</th>
                    <th class="wd-15p">UserName</th>
                    <th class="wd-15p">Email</th>
                    <th class="wd-15p">Phone</th>
                    <th class="wd-15p">Location</th>
                    <th class="wd-15p">Bank </th>
                    <th class="wd-15p">Account No</th>
                    <th class="wd-15p">Account Name</th>
                    <th class="wd-15p">Sex</th>
                    <th class="wd-15p">Age</th>
                    <th class="wd-15p">Date Joined</th>
                  </tr>
              </thead>
              <tbody>
                @if(count($activepromos) < 1)
                <tr>
                    <p>No record currently available</p>
                </tr>
                @else
                @foreach($activepromos as $key=>$state)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{ucfirst($state->username)}}</td>
                    <td>{{$state->email}}</td>
                    <td>{{$state->phone}}</td>
                    <td>{{$state->location}}</td>
                    <td>{{$state->account_bank}}</td>
                    <td>{{$state->account_name}}</td>
                    <td>{{$state->account_number}}</td>
                    <td>{{$state->sex}}</td>
                    <td>{{$state->age}}</td>
                    <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>
                    </tr>
                  @endforeach
                  @endif
                </tbody>

          </table>


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->



    </div>
    <!-- /.row -->

  </section>






    @endsection
