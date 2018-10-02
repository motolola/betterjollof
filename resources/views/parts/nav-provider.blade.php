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
                        <a class="navbar-brand hidden-xs" href="{{ url('provider/home') }}">
                            {{-- <small class="text-muted">Welcome {{ session('carer')->carer_name }}</small> --}}

                        </a>
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
{{--                             <li>
                                <a href="{{ url('provider/my-preferences') }}" title="Link to settings"><i class="cs-icon icon-sodexo-edit"></i> Settings</a>
                            </li> --}}
                            <li>
                            <a href="{{ route('contact') }}" title="Link to contact us"><i class="cs-icon icon-sodexo-phone-blank"></i> Contact us</a>
                            </li>
                            <li>
                                <a href="{{ route('carer-faqs') }}" title="Link to help"><i class="cs-icon icon-sodexo-help"></i> Faqs</a>
                            </li>
                            <li>
                                <a href="/logout" title="Link to logout"><i class="cs-icon icon-sodexo-logout"></i> Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="cs-lower-nav" class="cs-bg-light">
                <div class="container">
                    <div class="navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-center" style="display:block">
                            <li>
                                <a href="{{ route('provider-home') }}" title="Link to home">
                                    <i class="cs-icon-block icon-sodexo-dash"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('provider-parents') }}" title="Link to parent list">
                                    <i class="cs-icon-block icon-sodexo-suppliers"></i>
                                    <span class="hidden-sm">My </span>
                                    Parents
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('provider-vouchers') }}" title="Link to voucher list">
                                    <i class="cs-icon-block icon-sodexo-suppliers"></i>
                                    <span class="hidden-sm">My </span>
                                    Vouchers
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('provider-transactions') }}" title="Link to transaction list">
                                    <i class="cs-icon-block icon-sodexo-suppliers"></i>
                                    <span class="hidden-sm">My </span>
                                    Transactions
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('redeem-vouchers') }}" title="Link to transaction list">
                                    <i class="cs-icon-block icon-sodexo-suppliers"></i>
                                    <span class="hidden-sm">My </span>
                                    Redeem My Vouchers
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endif --}}

    </div>
</nav>
