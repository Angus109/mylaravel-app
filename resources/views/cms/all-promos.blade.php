@extends('layouts.admin')
@section('title')
All Promos
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Promotions</h3>
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

  </section>

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
