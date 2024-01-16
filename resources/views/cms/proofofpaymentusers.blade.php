@extends('layouts.admin')
@section('title')
Uploaded Proof Of Payment(s)
@endsection

@section('content')

<section class="content">
    
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Uploaded Proof Of Payment(s)</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th class="wd-10p" style="10%!important;">S/N</th>
                    <th class="wd-25p" style="25%!important;">User Name</th>
                    <th class="wd-10p" style="10%!important;">POP</th>
                    <th class="wd-15p" style="15%!important;">Status</th>
                    <th class="wd-20p" style="20%!important;">Date</th>
                    <th class="wd-20p" style="20%!important;">Action</th>
                  </tr>
              </thead>
              <tbody>
                @if(count($uploadedpop) < 1)
                <tr>
                    <p>No record currently available</p>
                </tr>
                @else
                @foreach($uploadedpop as $key=>$entry)
                <tr>
                    <td>{{++$key}}</td>
                    <td> {{ucWords(App\User::find($entry->user_id)->username)}}</td>
                    <td><img id="img_{{ $entry->id }}" src="https://lilyadd.com/storage/user_proofofpayments/{{ $entry->image }}" width="90" height="120" /></td>
                    <td>
                        @if($entry->status == 1) <button type="button" class="btn btn-success pd-x-5"> Approved</button>
                        @elseif($entry->status == 2) <button type="button" class="btn btn-danger pd-x-5"> Rejected</button>
                        @else <button type="button" class="btn btn-info pd-x-5"> Pending</button>
                        @endif
                    </td>
                    <td>{{ date('M j, Y h:ia', strtotime($entry->created_at)) }}</td>
                    <td>
                        <a id="viewbutton_{{ $entry->id }}" onclick="dopopimage({{ $entry->id }}, {{$entry->user_id}})"><button type="button" class="btn btn-info pd-x-10 viewbutton"><i class="fa fa-eye"></i> View</button></a>
                        <a onclick="fetchPost({{ $entry->id }}, {{$entry->user_id}})"><button type="button" class="btn btn-primary pd-x-10 pull-right" data-toggle="modal" data-target="#approveusertask"><i class="fa fa-check"></i> Approve</button></a>
                        <a onclick="rejectPost({{ $entry->id }}, {{$entry->user_id}})"><button type="button" class="btn btn-danger pd-x-10 pull-right" data-toggle="modal" data-target="#rejecttask"><i class="fa fa-ban"></i> Reject </button></a>
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
                            <input type="hidden" name="userid" value="" class="popuserid">
                            <div class="modal-body">
                                <div class="row">
                                    <p>Are you sure you want to Reject User Task?</p>
                                </div>

                            </div>
                        
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel <i class="fa fa-ban"></i></button>
                                <button type="submit" class="btn btn-primary">Yes <i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
                            <input type="hidden" name="userid" value="" class="popuserid">
                            <div class="modal-body">
                                <div class="row">
                                    <p>Are you sure you want to Approve User Task?</p>
                                    <code>Note: Task approved cannot be reverted</code>
                                </div>
                            </div>
                
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel <i class="fa fa-ban"></i></button>
                                <button type="submit" class="btn btn-primary">Yes <i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="popimagebox" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Proof Of Payment</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                
                <div class="modal-body">
                    <div class="mt-3 pt-1">
                        
                        <img id="popimageplaceholder" src="" width="500" height="auto" style="margin:auto;" />
    
                        <form id="popimagebox" action="" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="userid" value="" class="popuserid">
                            <div class="modal-body">
                                <div class="row">
                                    <p>Are you sure you want to Approve This Payment?</p>
                                    <code>Note: Payment(s) approved cannot be reverted</code>
                                </div>
                            </div>
                
                            <!--<div class="modal-footer">-->
                            <!--    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel <i class="fa fa-ban"></i></button>-->
                            <!--    <button type="submit" class="btn btn-primary">Yes <i class="fa fa-save"></i></button>-->
                            <!--</div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>

<script>
    function dopopimage(id, userid){
        event.preventDefault();
        var imageurl = $("#img_"+id).attr('src');
        $("#popimageplaceholder").attr('src', imageurl);
        $(".popuserid").attr('value', userid);
        var choice = $('#popimagebox').modal('show');
        console.log(choice);
    }
</script>
  
<script>
    function fetchPost(id, userid) {
        event.preventDefault();
        $.ajax({
            url: 'approvepayment/' + id,
            method: 'get',
            success: function(result){
                console.log(result);
                $('#statusEdit').val(result.status);
                var url = 'approvepayment/' + id;
                $(".popuserid").attr('value', userid);
                $('form#approveusertask').attr('action', url);
                $('#approveusertask').modal('show');
            }
        });
    }
</script>

<script>
    function rejectPost(id, userid) {
        event.preventDefault();
        $.ajax({
            url: 'rejectpayment/' + id,
            method: 'get',
            success: function(result){
                console.log(result);
                $('#statusEdit').val(result.status);
                var url = 'rejectpayment/' + id;
                $(".popuserid").attr('value', userid);
                $('form#rejecttask').attr('action', url);
                $('#rejecttask').modal('show');
            }
        });
    }
</script>


@endsection
