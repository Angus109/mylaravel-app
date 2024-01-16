@extends('layouts.app')
@section('title')
    Privacy Policy
@endsection
@section('content')
	    	<div class="pageContent">

                <div class="md-padding">
					<div class="container">
						<div class="row row-eq-height">
							<div class="col-md-4">
								<div class="heading style3">
									<h3 class="uppercase"><i class="fa fa-info-circle"></i><span class="main-color">Contact </span>Info</h3>
								</div>
								<ul class="list lg-v-pad">
									<li>
										<i class="fa fa-user"></i> <span class="bold main-color">Hotline:</span> {{$site->hotline}}
									</li>
									<li>
										<i class="fa fa-calendar"></i> <span class="bold main-color">Hotline2:</span> {{$site->hotline2}}
									</li>
									<li><i class="fa fa-check"></i> <span class="bold main-color">Email:</span> {{$site->site_email}}</li>
								</ul>
							</div>
							<div class="col-md-1">
								<div class="vertical-sep"></div>
							</div>
							<div class="col-md-7">
								<div class="heading style3">
									<h3 class="uppercase"><i class="fa fa-desktop"></i><span class="main-color">Privacy</span>Policy</h3>
								</div>
								<p> {!! $general->privacy_policy !!}</p>
							</div>
						</div>
					</div>
                </div>
	    	</div>
@endsection
