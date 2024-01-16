@extends('layouts.admin')
@section('title')
Advert Payments
@endsection

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Users on the platform</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>

          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
                  <tr>
                    <th class="wd-10p">#</th>
                    <th class="wd-15p">Ref</th>
                    <th class="wd-15p">FullName</th>
                    <th class="wd-15p">Amount</th>
                    <th class="wd-15p">Email</th>
                    <th class="wd-15p">Phone</th>
                    <th class="wd-15p">Address</th>
                    <th class="wd-15p">Advert </th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-15p">Date Paid</th>
                  </tr>
              </thead>
              <tbody>
                @if(count($usertasks) < 1)
                <tr>
                    <p>No record currently available</p>
                </tr>
                @else
                @foreach($usertasks as $key=>$state)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$state->gh}}</td>
                    <td>{{ucfirst($state->name)}}</td>
                    <td>₦{{number_format($state->amount), 2}}</td>
                    <td>{{$state->email}}</td>
                    <td>{{$state->phone}}</td>
                    <td>{{$state->address}}</td>
                    <td>{{$state->service}}</td>
                    <td>PAID</td>

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






    @endsection
