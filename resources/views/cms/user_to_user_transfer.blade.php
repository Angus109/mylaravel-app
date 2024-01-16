@extends('layouts.admin')
@section('title')
User Sent Transfer History
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All User Sent Transfer History</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>

          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Receiver</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>

                  </tr>
              </thead>
              <tbody>
                <tbody>
                    @if(count($gifts_sent) < 1)
                    <tr>
                        <p>No record currently available</p>
                    </tr>
                    @else
                    @foreach($gifts_sent as $key=>$state)

                        <tr>
                            <td>{{++$key}}</td>

                            <td>{{number_format($state->amount)}} LAT</td>
                            <td>{{ $state->receiver->username }}</td>
                                <td>

                                    <span

                                         class= "unit-amount text-white badge badge-success"
                                    >Success
                                    </span>

                                </td>

                                <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>

                            </tr>
                            @endforeach
                          @endif

                    </tbody>
                </tbody>

          </table>


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

    <!-- /.row -->
    <div class="modal fade" id="payuser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Pay User</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3 pt-1">

                    <form id="payuser" action="" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="status" value="1">
                            <div class="modal-body">
                                <div class="row">
                        <p>Are you sure you want to Pay User?
                        </p>
                        <code>Note: option cannot be reverted</code>
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
      <!-- /.content -->

  </section>



<script>

    function fetchPost(id) {

    event.preventDefault();

    $.ajax({
    url: 'payuser/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#statusEdit').val(result.status);
        var url = 'payuser/' + id;
        $('form#payuser').attr('action', url);
        $('#payuser').modal('show');
    }
    });

    }
    </script>





    @endsection
