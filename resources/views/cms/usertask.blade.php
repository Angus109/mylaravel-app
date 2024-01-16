@extends('layouts.admin')
@section('title')
All User Tasks
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All User Tasks</h3>
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
                    <a href="{{ route('cms.usertaskdetails', ['slug' => $state->task_slug, 'submission_reference' => $state->reference]) }}">
                    <button type="button" class="btn btn-info pd-x-10"><i class="fa fa-eye"></i> View</button>
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


    <div class="modal fade" id="rejecttask">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Reject Task</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3 pt-1">

                    <form id="rejecttask" action="" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="status" value="2">
                            <div class="modal-body">
                                <div class="row">
                        <p>Are you sure you want to Reject User Task?
                        </p>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel <i class="fa fa-ban"></i></button>
                    <button type="submit" class="btn btn-primary">Yes <i class="fa fa-save"></i></button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

  </section>
  <div class="modal fade" id="approveusertask">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Approve Task</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="mt-3 pt-1">

                <form id="approveusertask" action="" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="status" value="1">
                        <div class="modal-body">
                            <div class="row">
                    <p>Are you sure you want to Approve User Task?
                    </p>
                    <code>Note: Task approved cannot be reverted</code>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel <i class="fa fa-ban"></i></button>
                <button type="submit" class="btn btn-primary">Yes <i class="fa fa-save"></i></button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>

    function fetchPost(id) {

    event.preventDefault();

    $.ajax({
    url: 'approveusertask/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#statusEdit').val(result.status);
        var url = 'approveusertask/' + id;
        $('form#approveusertask').attr('action', url);
        $('#approveusertask').modal('show');
    }
    });

    }
    </script>

<script>

    function rejectPost(id) {

    event.preventDefault();

    $.ajax({
    url: 'rejecttask/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#statusEdit').val(result.status);
        var url = 'rejecttask/' + id;
        $('form#rejecttask').attr('action', url);
        $('#rejecttask').modal('show');
    }
    });

    }
    </script>

@endsection
