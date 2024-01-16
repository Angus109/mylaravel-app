@extends('layouts.admin')
@section('title')
Influencers Requests
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Influencers Requests</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>

          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Handle</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Amount</th>
                    <th>Provider</th>
                    <th>City</th>
                    <th>Referral</th>
                    <th>Description</th>
                    <th>Niche</th>
                    <th>Reach</th>
                    <th>Followers</th>
                    <th>Date</th>
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
                    <td>{{$state->name}}</td>
                    <td>{{$state->handle}}</td>
                    <td>{{$state->email}}</td>
                    <td>{{$state->phone}}</td>
                    <td>₦{{number_format($state->amount)}}</td>
                    <td>{{$state->provider}}</td>
                    <td>{{$state->city}}</td>
                    <td>{{$state->referral}}</td>
                    <td>{!! $state->description !!}</td>
                    <td>{{$state->niche}}</td>
                    <td>{{$state->reach}}</td>
                    <td>{{$state->followers}}</td>
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

                                    <form id="activepromo" action="" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-body">
                                                <div class="row">
                                        <p>Are you sure you want to close this Promotion?
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




    @endsection
