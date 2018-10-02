<nav class="navbar navbar-default">
    <div>

        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <div id="cs-top-nav">
                <div class="container">

                    <div class="navbar-collapse">
                        <span class="navbar-brand hidden-xs">
                            @if (!Auth::guest())
                            <small class="text-muted"> {{ "Welcome ".Auth::user()->username}}!</small>
                            @endif
                        </span>
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right data-uk-dropdown">
                            <li>
                                <a href="{{url('profile')}}" title="Link to settings"><i class="cs-icon icon-sodexo-edit"></i> Profile</a>
                            </li>
                            <li>
                                <a href="{{url('message/inbox')}}" title="Link to inbox"><i class="fa fa-inbox" aria-hidden="true"></i> Inbox</a>
                            </li>
                            <li>
                            <a href="" title="Link to contact us"><i class="cs-icon icon-sodexo-phone-blank"></i> Contact us</a>
                            </li>
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->firstname }} {{ Auth::user()->surname }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{url('profile')}}">Profile</a></li>
                                        <li><a href="{{url('order/received')}}">Received Orders</a></li>
                                        <li><a href="#">My Orders</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div id="cs-lower-nav" class="cs-bg-light">
                <div class="container">
                    <div class="navbar-collapse">
                        <!-- Left Side Of Navbar -->
             <!--           <ul class="nav navbar-nav navbar-center">
                            <li>
                                <a href="" title="Link to orders list">
                                    <i class="cs-icon-block icon-sodexo-invoices"></i>
                                    <span class="hidden-sm">My </span>
                                    Invoices
                                </a>
                            </li>
                            <li>
                                <a href="" title="Link to basic earnings assessment calculator">
                                    <i class="cs-icon-block icon-sodexo-calculator"></i>
                                    <abbr title="Basic Earnings Assessment">BEA</abbr> Calculator
                                </a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</nav>
