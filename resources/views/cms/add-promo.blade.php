@extends('layouts.admin')
@section('title')
Add New Promo
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add New Promo
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                      title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-md-6 col-sm-12">
                        <form  action="{{route('cms.savepromo')}}" method="POST" id="file-upload-form" accept-charset="utf-8" enctype="multipart/form-data">
                                {{csrf_field()}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for=""> Title <span class="tx-danger">*</span></label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Payment <span class="tx-danger">*</span></label>
                                    <input type="text" name="payment" class="form-control"placeholder="20LAT 20naira" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="role" class="control-label">Currency <span class="tx-danger">*</span></label>
                                    <select name="buttontype"  class="form-control" required>
                                       <option value="1">LAT</option>
                                       <option value="0">Naira</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control"  id="file-input" onchange="loadPreview(this)" multiple/>
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <div id="thumb-output"></div>
                                </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Video (Optional)</label>
                                        <input type="file" name="video" class="form-control"/>
                                        <span class="text-danger">{{ $errors->first('video') }}</span>
                                    </div>
                                    </div>
                                <div class="col-lg-12">
                                     <div class="form-group">
                                        <label for="role" class="control-label">Type <span class="tx-danger">*</span></label>
                                        <select name="type"  class="form-control" required>
                                           <option value="">select type</option>
                                           <option value="facebook">Facebook</option>
                                           <option value="twitter">Twitter</option>
                                           <option value="instagram">Instagram</option>
                                           <option value="youtube">Youtube</option>
                                           <option value="whatsapp">Whatsapp</option>
                                           <option value="other">Other</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Description </label>
                                    <textarea type="text" name="description" class="form-control"></textarea>
                                </div>
                                </div>

                                <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-sm">Submit Promo</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box -->

</div>
<!-- /.col-->
</div>
<!-- ./row -->
</section>
@endsection

@section('javascripts')

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

