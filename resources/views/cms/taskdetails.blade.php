@extends('layouts.admin')
@section('title')
    {{$property->task_slug}}
@endsection
@section('content')


    <?php
    $submission_slug = $property->task_slug;
    $submission_reference = @$_GET['submission_reference'];//echo $submission_reference;
    $the_images = [];
    ?>
    <section class="content-header">
      <h1>
         Task Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('cms.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$property->task_slug}}</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                
                <div class="box box-primary">
                  
                    <div class="box-header with-border">
                        <a href="{{ route('cms.usertask') }}"><button type="button" class="btn btn-primary pd-x-20"><i class="fa fa-arrow-left"></i> Back</button></a>
                    </div>
                    
                    <div class="box-body no-padding">
                        
                        <div class="mailbox-read-info">
                            <h3>Task Title: {{$property->task_slug}} </h3>
                            <p>Ref: {{$property->reference}} </p>
                            <p>Submited By:{{ $property->user->first()->username }} </p>
                        </div>
                        
                        Payment Type: <span class= "text-white badge badge-primary">{{$property->payment}}</span><br>

                        <div class="mailbox-controls with-border clearfix">
                            <div class="right-float">
                                <div class="btn-group">
                                    <i class="fa fa-clock-o"></i> Time: {{ date('M j, Y, h:ia', strtotime($property->created_at)) }}
                                </div>
                            </div>
                        </div>

                        <!-- =========================================================== -->
                        @if ($property->image != '')
                        <a href="{{ asset('storage/usertask_photo/' . $property->image) }}" target="_blank">
                        <img src="{{ asset('storage/usertask_photo/' . $property->image) }}" alt="Attachment" height="400" width="500">
                        </a>
                        
                        @endif
                        <br>
                        @if ($property->image2 != '')
                        <a href="{{ asset('storage/usertask_photo/' . $property->image2) }}" target="_blank">
                        <img src="{{ asset('storage/usertask_photo/' . $property->image2) }}" alt="Attachment" height="50" width="50">
                        </a>
                        
                        @endif
                        <br>
                        @if ($property->image3 != '')
                        <a href="{{ asset('storage/usertask_photo/' . $property->image3) }}" target="_blank">
                        <img src="{{ asset('storage/usertask_photo/' . $property->image3) }}" alt="Attachment" height="50" width="50">
                        </a>
                        
                        @endif
                        <!-- =========================================================== -->

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
                                <div class="modal-body">
                                    <div class="row">
                                        <p>Are you sure you want to approve User Task?</p>
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
    </section>

@endsection