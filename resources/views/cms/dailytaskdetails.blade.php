@extends('layouts.admin')
@section('title')
    {{$property->title}}
@endsection
@section('content')

    <section class="content-header">
      <h1>
         Task Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('cms.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$property->title}}</li>
      </ol>
    </section>
    <!-- Main content -->
    
    <section class="content">
    <div class="row">
      <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <a href="{{ route('cms.promos') }}">
                    <button type="button" class="btn btn-primary pd-x-20"><i class="fa fa-arrow-left"></i> Back</button>
                  </a>


            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>Task: {{$property->title}}</h3>
                <h3>Payment: {{$property->title}}</h3>
                
                @if($property->buttontype == 1)
                <span class= "text-white badge badge-primary">{{$property->payment}}</span>
                @else
                <span class= "text-white badge badge-success">{{$property->payment}}</span>
                @endif
                @if($property->status==1)
                <button type="button" class="btn btn-success pd-x-10">Active</button>
                @else
                 <button type="button" class="btn btn-danger pd-x-10"> Closed</button>
                 @endif
                 
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border clearfix">
                <div class="right-float">
                <div class="btn-group">
                     <i class="fa fa-clock-o"></i> Time: {{ date('M j, Y, h:ia', strtotime($property->created_at)) }}
                </div>
                </div>
                <!-- /.btn-group -->

              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">


                <p>{!! $property->description !!}</p>

              </div>
              <img src="{{ asset('storage/promotion_photos/' . $property->image) }}" alt="Attachment"/>
                <img src="{{ asset('storage/promotion_photos/' . $property->image2) }}" alt="Attachment"/>
                  <img src="{{ asset('storage/promotion_photos/' . $property->image3) }}" alt="Attachment"/>

              <!-- /.mailbox-read-message -->

            </div>

            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

  @endsection
