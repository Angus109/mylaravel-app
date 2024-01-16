@extends('layouts.dashboard_main')
@section('title')
    
@endsection
@section('content')
    
    <!-- Start Page Title Area -->
    <!--<div class="page-title-area page-title-bg2">-->
    <!--    <div class="shape-img2"><img src="/assets/img/shape/2.svg" alt="image"></div>-->
    <!--    <div class="shape-img3"><img src="/assets/img/shape/3.svg" alt="image"></div>-->
    <!--    <div class="shape-img4"><img src="/assets/img/shape/4.png" alt="image"></div>-->
    <!--    <div class="shape-img5"><img src="/assets/img/shape/5.png" alt="image"></div>-->
    <!--    <div class="shape-img7"><img src="/assets/img/shape/7.png" alt="image"></div>-->
    <!--    <div class="shape-img8"><img src="/assets/img/shape/8.png" alt="image"></div>-->
    <!--    <div class="shape-img9"><img src="/assets/img/shape/9.png" alt="image"></div>-->
    <!--    <div class="shape-img10"><img src="/assets/img/shape/10.png" alt="image"></div>-->
    <!--</div>-->
    <!-- End Page Title Area -->
    
    <div class="col-lg-12 col-md-12 mb-3" style="margin-top:100px;">
        
        <div class="service-card-one bg-white center">
            <h6>Upload Proof of Payment</h6>
        </div>

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
                
                @if(Session::has('success'))
                <div class="col-md-12">
                    <a href="{{ route('dashboard') }}"><p>Return to Dashboard.</p></a>
                </div>
                @else
                <form  id="file-upload-form" action="{{route('submit.uploadproofofpayment')}}" role="form" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!--<div class="form-group">-->
                    <!--    <label>Description</label>-->
                    <!--    <textarea type="text" name="note" class="form-control" placeholder="you may need to add task details here" ></textarea>-->
                    <!--</div>-->
                    <div class="form-group">
                        <label>Upload pictures (screenshot)</label>
                        <!--<p>you can upload multiple pictures</p>-->
                        <input type="file" name="image" class="form-control" id="file-input" onchange="loadPreview(this)" multiple/>
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        <div id="thumb-output"></div>
                    </div>
                    <button type="submit"  class="default-btn">Upload Proof of Payment<span></span></button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
                @endif
                

            </div>
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
