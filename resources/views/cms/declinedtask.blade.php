@extends('layouts.admin')
@section('title')
Declined Tasks
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Declined Users Tasks</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th class="wd-10p">S/N</th>
                    <th class="wd-15p">Ref</th>
                    <th class="wd-15p">User Name</th>
                    <th class="wd-15p">Title</th>
                    <th scope="wd-15p">Payment Type</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-15p">Date</th>
                    <th class="wd-15p">Action</th>
                  </tr>
              </thead>
              <tbody>
                @if(count($usertasks) < 1)
                <tr>
                    <p>No record currently available</p>
                </tr>
                @else
                @foreach($usertasks as $key=>$state)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$state->reference}}</td>
                    <td> {{ucWords(App\User::find($state->user_id)->username)}}</td>
                    <td>{{$state->task_slug}}</td>
                    <td >
                        @if($state->buttontype == 1)
                            <span class= "text-white badge badge-primary">{{$state->payment}}</span>
                            @else
                            <span class= "text-white badge badge-success">{{$state->payment}}</span>
                            @endif
                        </td>
                        <td>
                            @if($state->status == 1)

                                <button type="button" class="btn btn-success pd-x-5"> Approved</button>
                                @elseif($state->status == 2)
                                <button type="button" class="btn btn-danger pd-x-5"> Rejected</button>
                                @else
                                <button type="button" class="btn btn-info pd-x-5"> Pending</button>

                             @endif
                            </td>
                    <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>
                    <td>
                    <a href="{{ route('cms.usertaskdetails', ['slug' => $state->task_slug]) }}">
                    <button type="button" class="btn btn-primary pd-x-20"><i class="fa fa-eye"></i> View</button>
                  </a>
                    </td>
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
