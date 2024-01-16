        <!-- Start Navbar Area -->
        <div class="navbar-area">
         <div class="aronix-responsive-nav">
             <div class="container">
                 <div class="aronix-responsive-menu">
                     <div class="logo">
                         <a href="{{url('/')}}">
                             <img src="{{asset($site->logo)}}" width="50" height="100"alt="logo">
                         </a>
                     </div>
                 </div>
             </div>
         </div>

         <div class="aronix-nav">
             <div class="container">
                 <nav class="navbar navbar-expand-md navbar-light">
                     <a class="navbar-brand" href="{{url('/')}}">
                         <img src="{{asset($site->logo)}}" width="50" height="100"  alt="logo">
                     </a>

                     <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                         <ul class="navbar-nav">

                                 <li class="nav-item" @if(active('/')) class="active"  @endif >
                                     <a href="{{url('/')}}" class="nav-link active">
                                         Home
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{route('aboutus')}}" class="nav-link active">
                                         About Us
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{route('advertise')}}" class="nav-link active">
                                         Advertise with us
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{route('influencer')}}" class="nav-link active">
                                         Earn as Influencer <i class="fas fa-chevron-down"></i>
                                     </a>
                                     <ul class="dropdown-menu">
                                        @foreach($influencersall as $product)
                                         <li class="nav-item">
                                             <a href="{{ route('influencers.details', ['slug' => $product->slug]) }}" class="nav-link">{{$product->name}}</a>
                                         </li>
                                         @endforeach
                                     </ul>
                                 </li>
                                 {{-- <li class="nav-item">
                                     <a href="{{route('pricing')}}" class="nav-link active">
                                         Pricing
                                     </a>
                                 </li> --}}

                                 <li class="nav-item">
                                     <a href="{{route('contact')}}" class="nav-link active">
                                         Contact Us
                                     </a>
                                 </li>
                                 @guest
                                 <li class="nav-item">
                                     <a href="{{route('register')}}" class="nav-link active">
                                         Register
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{route('login')}}" class="nav-link active">
                                         Login
                                     </a>
                                 </li>
                                 @endguest
                                 @auth
                                 <li class="nav-item">
                                    <a href="{{route('dashboard')}}" class="nav-link active">
                                    {{ucfirst(Auth::User()->username)}}
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="{{route('logout')}}" class="nav-link ">
                                        Logout
                                    </a>
                                </li>
                                @endauth

                         </ul>
                     </div>
                 </nav>
             </div>
         </div>

     </div>
     <!-- End Navbar Area -->
