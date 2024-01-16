        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="aronix-responsive-nav">
                <div class="container">
                    <div class="aronix-responsive-menu">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{asset($site->logo)}}" width="50" height="30"alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="aronix-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset($site->logo)}}" width="50" height="30"  alt="logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="nav-link active">
                                        <i class="fa fa-home"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.dailytask') }}" class="nav-link ">
                                        <i class="fa fa-volume-up"></i>
                                        My Tasks
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.wallet') }}" class="nav-link ">
                                        <i class="fa fa-wallet"></i>
                                        My Wallet
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        {{ucfirst(Auth::User()->username)}}
                                        <i class="fas fa-chevron-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('profile') }}" class="nav-link ">
                                                <i class="fa fa-address-book"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('logout') }}" class="nav-link">
                                                <i class="fa fa-power-off"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
