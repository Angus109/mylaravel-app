@extends('layouts.admin')
@section('title')
Paid Withdrawer Requests
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">aLL Paid Withdrawer Requests</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>

          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th class="wd-10p">#</th>
                    <th class="wd-15p">Ref</th>
                    <th class="wd-15p">UserName</th>
                    <th class="wd-15p">Type</th>
                    <th class="wd-15p">Amount Paid</th>
                    <th class="wd-15p">Naira Balance</th>
                    <th class="wd-15p">Lat Balance</th>
                    <th class="wd-15p">Date Paid</th>

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
                    <td>{{$state->reference}}</td>
                    <td>{{ucWords(App\Wallet::find($state->wallet_id)->user->username)}}</td>
                    <td>{{$state->type}}</td>
                    <td>
                        ₦{{number_format($state->amount), 2}}
                    </td>
                    <td>₦ {{App\Wallet::find($state->wallet_id)->naira_wallet}}</td>
                    <td>{{App\Wallet::find($state->wallet_id)->lat_wallet}}</td>
                    <td>{{ date('M j, Y h:ia', strtotime($state->updated_at)) }}</td>
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
