@extends('layouts.admin')
@section('title')
Contact Requests
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">MESSAGES FROM CLIENTS</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th class="wd-10p">#</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-15p">Email</th>
                    <th class="wd-15p">Subject</th>
                    <th class="wd-15p">Message</th>
                    <th scope="wd-15p">Date/Time</th>
                    <th class="wd-15p">Action</th>
                  </tr>
              </thead>
              <tbody>
                @if(count($contacts) < 1)
                <tr>
                    <th>No record currently available</th>
                </tr>
                @else
                @foreach($contacts as $key=>$state)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$state->name}}</td>
                    <td>{{$state->email}}</td>
                    <td>{{$state->subject}}</td>
                    <td>{!! $state->message !!}</td>
                    <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>
                    <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#contacts" onclick="fetchPost({{ $state->id }})">Mark Read <i class="fa fa-check "></i></button>
                    <a  onclick="deleteContact({{ $state->id }})">
                      <a href="#" class="btn btn-danger btn-icon mg-r-5 mg-b-10" onclick="deleteContact({{ $state->id }})"><i class="icon ion-ios-trash-outline tx-24"></i> Delete</a></a>
                      </a>
                      <a href="mailto:{{$state->email}}" class="btn btn-primary btn-icon mg-r-5 mg-b-10"><i class="fa fa-check tx-24"></i> Reply</a></a>
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
                        <div class="modal fade" id="contacts">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Mark as Read</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div id="contacts" class="modal-body">
                                    <div class="mt-3 pt-1">

                                    <form id="contacts" action="" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-body">
                                                <div class="row">

                                        <p>Are you sure you want to Mark Message as Read?
                                        </p>
                                            </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel <i class="fa fa-ban"></i></button>
                                    <button type="submit" class="btn btn-primary">Yes <i class="fa fa-refresh"></i></button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
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
                url: 'delete/contacts/' + id,
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
    url: 'contacts/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#statusEdit').val(result.status);

        var url = 'contacts/' + id;
        $('form#contacts').attr('action', url);
        $('#contacts').modal('show');
    }
    });

    }
    </script>

    @endsection
