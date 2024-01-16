@extends('layouts.dashboard_main')
@section('title')
    My Tasks
@endsection
@section('content')

        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg2">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <div class="row">
                                <div class="col-lg-3 col-xs-6 col-md-6">
                                    <div class="service-card-one bg-white center">
                                        <div class="icon">
                                            <i class="bx bx-laptop"></i>
                                            <i class='bx bxs-gift check-icon'></i>
                                        </div>
                                        <h3>
                                            <a href="javascript:void()">My Tasks</a>
                                        </h3>
                                        <p>{{$mytasks}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6 col-md-6">
                                    <div class="service-card-one bg-white center">
                                        <div class="icon">
                                            <i class='bx bx-list-check'></i>
                                            <i class='bx bxs-badge-check check-icon'></i>
                                        </div>
                                        <h3>
                                            <a href="{{ route('completedtasks') }}">Confirmed Tasks</a>
                                        </h3>
                                        <p>{{$completetasks}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6 col-md-6">
                                    <div class="service-card-one bg-white center">
                                        <div class="icon">
                                            <i class="bx bxs-megaphone"></i>
                                            <i class='bx bxs-bell check-icon'></i>
                                        </div>
                                        <h3>
                                            <a href="{{ route('pendingtasks') }}">Pending Tasks</a>
                                        </h3>
                                        <p>{{$pendingtasks}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6 col-md-6">
                                    <div class="service-card-one bg-white center">
                                        <div class="icon">
                                            <i class="bx bx-conversation"></i>
                                            <i class='bx bxs-error-alt check-icon'></i>
                                        </div>
                                        <h3>
                                            <a href="{{ route('rejectedtasks') }}">Rejected Tasks</a>
                                        </h3>
                                        <p>{{$rejectedtask}}</p>
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

        <!-- Start Cart Area -->
		<section class="ptb-100 bg-F4F7FC" id="promotions">
            <div class="container">
                <div class="section-title">
                    <h2>My Tasks</h2>
                    <p>Tasks you opted into.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div>
                            <div class="card-table table-responsive">
                                <table class="table table-bordered" id="data-table">
                                    <thead>
                                        <tr class="bg-primary text-center">
                                            <th class="font-weight-bold">S/N</th>
                                            <th class="font-weight-bold">Ref</th>
                                            <th class="font-weight-bold">Title</th>
                                            <th class="font-weight-bold">Description</th>
                                            <th class="font-weight-bold">Payment Type</th>
                                            <th class="font-weight-bold">Status</th>
                                            <th class="font-weight-bold">Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @if(count($dailytasks) < 1)
                                        <tr>
                                            <p>No record currently available</p>
                                        </tr>
                                        @else
                                    @foreach($dailytasks as $key=>$state)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$state->reference}}</td>
                                            <td>{{$state->task_slug}}</td>
                                            <td>{!! $state->note !!}</td>
                                            <td class="product-price">
                                                @if($state->buttontype == 1)
                                                    <span class= "text-white badge badge-primary">{{$state->payment}}</span>
                                                    @else
                                                    <span class= "text-white badge badge-success">{{$state->payment}}</span>
                                                    @endif
                                                </td>
                                            <td class="product-price">
                                                @if($state->status == 1)
                                                    <span class= "text-white badge badge-success">Complete</span>
                                                    @elseif($state->status == 2)
                                                    <span class= "text-white badge badge-danger">Rejected</span>
                                                    @else
                                                    <span class= "text-white badge badge-primary">Pending</span>
                                                 @endif
                                                </td>

                                           <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>

                                       </tr>

                                       @endforeach
                                      @endif


                                    </tbody>
                                </table>
                                {{ $dailytasks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- End Cart Area -->


@endsection
