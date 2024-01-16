@extends('layouts.admin')
@section('title')
Closed Promo
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Closed Promotions</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>

          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th class="wd-10p">#</th>
                    <th class="wd-15p">Title</th>
                    <th class="wd-15p">Image</th>
                    <th class="wd-15p">Type</th>
                    <th class="wd-15p">Link</th>
                    <th class="wd-15p">Payment</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-15p">Date</th>
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
                    <td>{{$state->title}}</td>
                    <td>
                        <a href="{{ asset('storage/promotion_photos/' . $state->image) }}" target="_blank">
                        <img src="{{ asset('storage/promotion_photos/' . $state->image) }}" alt="Attachment" height="50" width="50">
                        </a>
                    </td>
                    <td>{{$state->type}}</td>
                    <td>
                    <a href="{{ route('cms.dailytaskdetails', ['slug' => $state->slug]) }}">
                    <button type="button" class="btn btn-success pd-x-20"><i class="fa fa-eye"></i> View</button>
                    </a>
                    </td>
                    <td class="product-price">
                        @if($state->buttontype == 1)
                            <span class= "text-white badge badge-primary">{{$state->payment}}</span>
                            @else
                            <span class= "text-white badge badge-success">{{$state->payment}}</span>
                            @endif
                        </td>
                    @if($state->status==0)
                     <td> <button type="button" class="btn btn-success pd-x-10">Active</button></td>
                     @else($state->status==1)
                      <td><button type="button" class="btn btn-danger pd-x-10"> Closed</button></td>
                      @endif

                    <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>
                    <td>
                        <a  onclick="deleteContact({{ $state->id }})">
                            <a href="#" class="btn btn-danger btn-icon mg-r-5 mg-b-10" onclick="deleteContact({{ $state->id }})"><i class="icon ion-ios-trash-outline tx-24"></i> Trash</a></a>
                          </a>
                    <a onclick="fetchPost({{ $state->id }})">
              <button type="button" class="btn btn-success pd-x-20 pull-right" data-toggle="modal" data-target="#promotersModal"><i class="fa fa-ban"></i> Re-Open</button>
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
                      <div class="modal fade" id="promotersModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Close Promotion</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-3 pt-1">

                                    <form id="openpromo" action="" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="status" value="0">
                                            <div class="modal-body">
                                                <div class="row">
                                        <p>Are you sure you want to Re-Open this Promotion?
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

  <!-- /.content -->
  <script>

    function showMessage(id) {
        $('#' + id).modal('show');
    }

    function deleteContact(id) {

        event.preventDefault();

        if (confirm("Are you sure?")) {

            $.ajax({
                url: 'delete/activepromo/' + id,
                method: 'get',
                success: function(result){
                    window.location.assign(window.location.href);
                }
            });

        } else {

            console.log('Delete process cancelled');

        }

    }

    </script>

    <script>

    function fetchPost(id) {

    event.preventDefault();

    $.ajax({
    url: 'openpromo/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#statusEdit').val(result.status);
        var url = 'openpromo/' + id;
        $('form#openpromo').attr('action', url);
        $('#promotersModal').modal('show');
    }
    });

    }
    </script>


    @endsection
