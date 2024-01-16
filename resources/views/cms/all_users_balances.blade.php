@extends('layouts.admin')
@section('title')
User Wallet Balance
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">aLL User Wallet Balance</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>

          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th class="wd-10p">#</th>
                    <th class="wd-15p">UserName</th>
                    <th class="wd-15p">Naira Balance (₦)</th>
                    <th class="wd-15p">Lat Balance (L)</th>
                    <th class="wd-15p">Action</th>

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
                    <td>{{ucWords(App\Wallet::find($state->user_id)->user->username)}}</td>
                    <td>{{number_format($state->naira_wallet)}} </td>
                    <td>{{number_format($state->lat_wallet)}} </td>
                    <td>
                        <a onclick="fetchPost({{ $state->id }})">
                            <button type="button" class="btn btn-primary pd-x-10 pull-right" data-toggle="modal" data-target="#updatewallet"><i class="fa fa-check"></i> Update Wallet </button>
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

    <!-- /.row -->
    <div class="modal fade" id="updatewallet">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update User Wallet</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3 pt-1">

                    <form id="updatewallet" action="" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            {{-- <input type="hidden" name="status" value="1"> --}}
                            <div class="modal-body">
                                <div class="row">
                        <p>Are you sure you want to Update User Wallet?
                        </p>
                        <code>Note: option cannot be reverted</code><br>
                        <label>lAT Amount (L)</label>
                        <input type="number" name="lat_wallet" id="latEdit" class="form-control"><br>
                        <label>Naira Amount (₦)</label>
                        <input type="number" name="naira_wallet" id="nairaEdit" class="form-control">
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
    url: 'updatewallet/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#latEdit').val(result.lat_wallet);
        $('#nairaEdit').val(result.naira_wallet);
        var url = 'updatewallet/' + id;
        $('form#updatewallet').attr('action', url);
        $('#updatewallet').modal('show');
    }
    });

    }
    </script>




    @endsection
