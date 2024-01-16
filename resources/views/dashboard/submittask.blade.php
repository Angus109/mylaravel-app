    <!-- BASIC MODAL -->
    <div id="modaldemo1" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Submit Task</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form  action="{{ route('submit.task')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="slug" value="{{$property->name}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="name" class="form-control" required  value="{{ucfirst(Auth::User()->name)}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" name="phone" class="form-control" required value="{{ucfirst(Auth::User()->phone)}}">
                    </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" name="email" class="form-control" required value="{{ucfirst(Auth::User()->email)}}">
                        </div>
                    </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Attachment 1</label>
                                  <input type="file" name="image" class="form-control">
                              </div>
                          </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Attachment 2</label>
                                  <input type="file" name="image2" class="form-control" >
                              </div>
                          </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Attachment 3</label>
                                  <input type="file" name="image3" class="form-control">
                              </div>
                          </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Attachment 4</label>
                                  <input type="file" name="image4" class="form-control" >
                              </div>
                          </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Attachment 5</label>
                                  <input type="file" name="image5" class="form-control" >
                              </div>
                          </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Attachment 6</label>
                                  <input type="file" name="image6" class="form-control" >
                              </div>
                          </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Attachment 7</label>
                                  <input type="file" name="image7" class="form-control" >
                              </div>
                          </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Attachment 8</label>
                                  <input type="file" name="image8" class="form-control" >
                              </div>
                          </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Note</label>
                            <textarea name="body" class="form-control" ></textarea>
                        </div>
                    </div>
                </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pd-x-20">Save</button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          </div>
        </div><!-- modal-dialog -->

      </div><!-- modal -->
