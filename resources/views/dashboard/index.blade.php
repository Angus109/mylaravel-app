@extends('layouts.dashboard_main')
@section('title')
    Home
@endsection
@section('content')



        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg2">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="service-card-one bg-white center">
                                        <div class="icon">
                                            <i class="bx bx-laptop"></i>
                                            <i class='bx bxs-badge-check check-icon'></i>
                                        </div>
                                        <h3>
                                            <a href="#promotions">Tasks Opt-in</a>
                                        </h3>
                                        <a href="#promotions">
                                            <p>For tasks to perform, Click here to get and opt in to available tasks.</p>
                                        </a>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="service-card-one bg-white center">
                                        <div class="icon">
                                            <i class="bx bx-conversation"></i>
                                            <i class='bx bxs-badge-check check-icon'></i>
                                        </div>
                                        <h3>
                                            <a href="../../docs/influencers.jpg" class="get_manual" target="blank">User Manual</a>
                                        </h3>
                                        <a href="javascript:void()" class="get_manual">
                                            <p>For understanding the operations in lillyadd, click here to download.</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="service-card-one bg-white center">
                                        <div class="icon">
                                            <i class="bx bxs-megaphone"></i>
                                            <i class='bx bxs-badge-check check-icon'></i>
                                        </div>
                                        <h3>
                                            <a href="{{ route('dashboard.dailytask') }}">Task Submission</a>
                                        </h3>
                                        <a href="{{ route('dashboard.dailytask') }}">
                                            <p>For tasks that has been performed, click here to submit your tasks.</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                <p>
                    - You opt in any available promotion/task to perform below which would be posted either 9am, 12pm, 3pm or 6pm.<br>
                    - After promoting, come back here to submit it with the required screenshots.<br>
                    - Task confirmation takes 7days to be approved or cancelled.<br>
                    - After earning up to 1,000 Naira you can withdraw and it takes 48hrs to process withdrawals.<br>
                    - While processing withdrawals, If found that you tried cheating the system in whatsoever way(either double account or using other people screenshots), your account would be deactivated and you loose all earnings.<br>
                    - Some tasks are LAT based task meaning you earn LAT for those tasks. Go to your wallet page to see how you can convert it to Naira.<br>
                    - You can also use your LAT to promote your business or brand on lillyadd. Minimum of 6,000LAT.<br>
                    - You earn 10% (paid in LAT) by bringing clients to advertise with lillyadd.<br>
                    <a href="{{route('faqs')}}">For more details, click here to visit the FAQ section.</a>
                </p>
            </div>
        </div>
        <!--begin::Modal-->
        <div class="modal" id="update_task_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center center">
                        <h4 class="modal-title" id="categoryModalLabel"><strong> Hello! {{ucfirst(Auth::User()->username)}}</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <div class="modal-body">
                    <div class="justify-content-center">
                        - You can now send LAT to other lillyadd Users. <a class="text-info" href="/docs/influencers.jpg" target="_blank">Follow this link to send.</a> <br>
                        - We now have a task schedule/calendar. Just click on the green text below available tasks to see it.<br>
                        - We now have multi-social promotion. Go to your profile and activate if you are eligible. <br>
                        - You should know that opt-in slots are limited. They can get filled up.
                    </div>
                  </div>
                  <div class="modal-footer">
                      <a type="button" class="btn btn-primary" href="#withdrawals">Users withdrawals</a>
                      <button type="button" class="btn btn-success" onclick="swRegister()"  data-dismiss="modal">Activate Device Notifications</button>
                  </div>
                </div>
            </div>
        </div>
        <!-- end::Modal -->
        
        <!--begin::Modal-->
        <div class="modal" id="calendar_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center center">
                        <h4 class="modal-title" id="categoryModalLabel"><strong>Task calendar for Today.</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <div class="modal-body">
                    <div class="justify-content-center">
                        Please note that you would need to keep checking here for changes because the schedule is not always fixed.
                    </div>
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-primary text-center">
                                <th class="font-weight-bold">9am</th>
                                <th class="font-weight-bold">12pm</th>
                                <th class="font-weight-bold">3pm</th>
                                <th class="font-weight-bold">6pm</th>
                                <th class="font-weight-bold">9pm</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class= "text-center">
                                    <td>{{$calendar->title1}}</td>
                                    <td>{{$calendar->title2}}</td>
                                    <td>{{$calendar->title3}}</td>
                                    <td>{{$calendar->title4}}</td>
                                    <td>{{$calendar->title5}}</td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
            </div>
        </div>
        <!-- end::Modal -->
        
        <!--begin::Modal-->
        <?php if(Auth::User()->paid == 'no'){ ?>
        <div class="modal" id="payment_reminder_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center center">
                        <h4 class="modal-title" id="categoryModalLabel"><strong> Hello! {{ucfirst(Auth::User()->username)}}</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closePOPModal()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <div class="modal-body">
                    <div class="justify-content-center">
                        - You are required to make a payment of <b>&#8358;1,000.00</b> only to activate your account.<br>
                        - Tasks are enabled upon confirmation of your payment.<br>
                        - Please make the required payment to the following account.
                        <br><br><span>Account Name: <span style="font-weight:bold;">LILYSOLUTIONS LIMITED.</span><br>Account Number: <span style="font-weight:bold;">2040313580</span><br>Bank Name: <span style="font-weight:bold;">First bank</span></span>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <!--<a type="button" class="btn btn-default" href="#">I already made payment,<br>Open A Claim</a>-->
                      <a type="button" class="btn btn-success" href="{{ route('dashboard.proofofpayment') }}">Upload Proof of Payment</a>
                  </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- end::Modal -->

        <!-- Start Cart Area -->
		<section class="cart-area ptb-100 gray-bg" id="promotions">
            <div class="container">
                <div class="section-title">
                    <h2>Available Promotions</h2>
                    <p>Opt in to any available promotion.</p>
                    <i>
                        <small data-toggle="modal" data-target="#calendar_modal">
                            <strong class="text-success">
                                Today's Calendar (Click here to view Task schedule for today)
                            </strong>
                        </small>

                    </i>

                </div>
                @if(count($presentpromotion) < 1)
                <div class="col-lg-12 col-md-12 mb-12">
                    <div class="service-card-one bg-white center">
                        <p onclick="swRegister()">
                            All Promotions are currently filled up. No available promotion for you to perform at the moment.<br>
                            You would get notified as soon as a new promotion is available.<br>
                            If you do not get notifications, kindly click here but make sure you have cleared your cache and also enabled lillyadd.co to send you notifications on your browser or else you would miss out on tasks to perform.<br>
                            If you do not know how to enable notifications, you can check google on how to enable notifications on your browser.<br>
                            You should also know that you earn 10% (paid in LAT) if you refer any person/business to advertise with lillyadd.<br>
                        </p>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div>
                            <div class="card-table table-responsive">
                                <table class="table table-bordered" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>

                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($presentpromotion as $key=>$state)
                                        <tr>

                                            <td>{{++$key}}</td>
                                            <td>{{$state->title}}</td>
                                            <td>{{$state->type}}</td>


                                                <td class="product-price">
                                                @if($state->buttontype == 1)
                                                    <span class= "text-white badge badge-primary">{{$state->payment}}</span>
                                                    @else
                                                    <span class= "text-white badge badge-success">{{$state->payment}}</span>
                                                    @endif
                                                </td>
                                                <td class= "">

                                                    <span class= "unit-amount text-white badge badge-success">Available</span>

                                                </td>
                                                <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>
                                                <td>
                                                    <?php if(Auth::User()->paid == 'no'){ ?>
                                                    <a href="javascript:;" onclick="openPOPModal()"><button type="button" class="btn btn-success pd-x-20"> Apply <i class="fa fa-arrow-right"></i></button></a>
                                                    <?php }else{ ?>
                                                    <a href="{{ route('dashboard.dailytaskdetails', ['slug' => $state->slug]) }}"><button type="button" class="btn btn-success pd-x-20"> Apply <i class="fa fa-arrow-right"></i></button></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
            <div class="container mt-5">
                <div class="section-title">
                    <h2>Recently Closed Promotions</h2>
                    <p>You can't opt in for these promotions because they are filled up.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div>
                            <div class="card-table table-responsive">
                                <table class="table table-bordered" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>

                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                      @if(count($pastpromotions) < 1)
                                        <tr>
                                            <p>No promotion currently available</p>
                                        </tr>
                                        @else
                                        @foreach($pastpromotions as $key=>$state)
                                        <tr>

                                            <td>{{++$key}}</td>
                                            <td>{{$state->title}}</td>
                                            <td>{{$state->type}}</td>


                                                <td class="product-price">
                                                @if($state->buttontype == 1)
                                                    <span class= "text-white badge badge-primary">{{$state->payment}}</span>
                                                    @else
                                                    <span class= "text-white badge badge-success">{{$state->payment}}</span>
                                                    @endif
                                                </td>
                                                <td class= "">

                                                    <span class= "unit-amount text-white badge badge-danger">Filled Up</span>

                                                </td>
                                                <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>
                                                {{-- <td>
                                                    <a href="{{ route('dashboard.dailytaskdetails', ['slug' => $state->slug]) }}">
                                                    <button type="button" class="btn btn-success pd-x-20"><i class="fa fa-eye"></i> View</button>
                                                  </a>
                                                    </td> --}}
                                            </tr>

                                            @endforeach
                                           @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5" id="withdrawals">
                <div class="section-title">
                    <h2>Recent Users withdrawals</h2>
                    <p>A list showing last 500 users withdrawals.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div>
                            <div class="card-table table-responsive">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>

                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date Requested</th>
                                            <th>Date Paid</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @if(count($user_withdrawers) < 1)
                                    <tr>
                                        <p>No record currently available</p>
                                    </tr>
                                    @else
                                    @foreach($user_withdrawers as $key=>$state)

                                            <tr>
                                            <td>{{++$key}}</td>

                                            <td>₦{{number_format($state->amount)}}</td>
                                                <td>
                                                @if($state->status == 1)
                                                    <span

                                                         class= "unit-amount text-white badge badge-warning"
                                                    >pending
                                                    </span>
                                                    @else
                                                    <span

                                                        class= "unit-amount text-white badge badge-success"
                                                   >paid
                                                   </span>
                                                    @endif
                                                </td>
                                                <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>
                                                <td>{{ date('M j, Y h:ia', strtotime($state->updated_at)) }}</td>
                                            </tr>
                                            @endforeach
                                          @endif

                                    </tbody>
                                </table>
                                {{ $user_withdrawers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- End Cart Area -->
		
		<script>
		    function closePOPModal(){ $("#payment_reminder_modal").prop({'style':'display:none;'}) }
		    function openPOPModal(){ $("#payment_reminder_modal").prop({'style':'display:block;'}) }
		</script>


@endsection


