@extends('layouts.dashboard_main')
@section('title')
    {{$property->title}}
@endsection
@section('content')



        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg2">


            <div class="shape-img2"><img src="/assets/img/shape/2.svg" alt="image"></div>
            <div class="shape-img3"><img src="/assets/img/shape/3.svg" alt="image"></div>
            <div class="shape-img4"><img src="/assets/img/shape/4.png" alt="image"></div>
            <div class="shape-img5"><img src="/assets/img/shape/5.png" alt="image"></div>
            <div class="shape-img7"><img src="/assets/img/shape/7.png" alt="image"></div>
            <div class="shape-img8"><img src="/assets/img/shape/8.png" alt="image"></div>
            <div class="shape-img9"><img src="/assets/img/shape/9.png" alt="image"></div>
            <div class="shape-img10"><img src="/assets/img/shape/10.png" alt="image"></div>
        </div>
        <!-- End Page Title Area -->
        <div class="col-lg-12 col-md-12 mb-3">
            <div class="service-card-one bg-white center">
                <h6>Promo Details</h6>
                <h2>Title: {{$property->title}}</h2>
                {{-- <a href="{{URL::to($property->image)}}" target="_blank"> --}}

                    @if ($property->image != '')
                    <div class="contact-image">
                        <a href="{{ asset('storage/promotion_photos/' . $property->image) }}" target="_blank">
                            <img src="{{ asset('storage/promotion_photos/' . $property->image) }}" alt="Attachment" height="150" width="250">
                        </a>
                    @endif
                    <br>
                    @if ($property->image2 != '')
                    <div class="contact-image">
                        <a href="{{ asset('storage/promotion_photos/' . $property->image2) }}" target="_blank">
                            <img src="{{ asset('storage/promotion_photos/' . $property->image2) }}" alt="Attachment" height="150" width="250">
                        </a>
                    </div>
                    @endif
                    @if ($property->image3 != '')
                    <div class="contact-image">
                        <a href="{{ asset('storage/promotion_photos/' . $property->image3) }}" target="_blank">
                            <img src="{{ asset('storage/promotion_photos/' . $property->image3) }}" alt="Attachment" height="150" width="250">
                        </a>
                    </div>
                    @endif
                </div>

                    <p>{!! $property->description !!}</p>
                    <br>
                    <h6>Type: {{$property->type}}</h6>

                    @if($property->buttontype == 1)
                    <strong>Reward: </strong><span class= "text-white badge badge-primary">{{$property->payment}}</span>
                    @else
                    <strong>Reward: </strong><span class= "text-white badge badge-success">{{$property->payment}}</span>
                    @endif
                    <br>


                    <br>
                    {{-- @if($property->status == 1 )

                    @else --}}

                    <div class="container">
                        <div class="form-content">
                            @if(Session::has('success'))
                            <div class="col-md-12">
                                <div class="alert alert-success no-b">
                                    <span class="text-semibold"></span> {{ Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                </div>
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="col-md-12">
                              <div class="alert alert-danger no-b">
                                  <span class="text-semibold"></span> {{ Session::get('error')}}
                                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                              </div>
                          </div>
                            @endif
                           <form  id="file-upload-form" action="{{route('submit.task')}}" role="form" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <input type="hidden" name="task_slug"  value=" {{$property->title}}">
                            <input type="hidden" name="promotion_id"  value=" {{$property->id}}">
                            <input type="hidden" name="payment"  value=" {{$property->payment}}">
                            <input type="hidden" name="buttontype"  value=" {{$property->buttontype}}">
                              {{csrf_field()}}
                              <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" name="note" class="form-control" placeholder="you may need to add task details here" ></textarea>
                              </div>
                                <div class="form-group">
                                    <label>Upload pictures (screenshot)</label>
                                    <p>you can upload multiple pictures</p>
                                    <input type="file" name="image" class="form-control" id="file-input" onchange="loadPreview(this)" multiple/>
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <div id="thumb-output"></div>
                                </div>
                                <button type="submit"  class="default-btn">Submit Task <span></span></button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </form>

                        </div>
                    </div>
                    {{-- @endif --}}


            </div>

        </div>


        <script>

            function loadPreview(input){
                var data = $(input)[0].files;
                $.each(data, function(index, file){
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
                        var fRead = new FileReader();
                        fRead.onload = (function(file){
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image thumb element
                                $('#thumb-output').append(img);
                            };
                        })(file);
                        fRead.readAsDataURL(file);
                    }
                });
            }

        </script>
@endsection
