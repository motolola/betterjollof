<nav class="navbar navbar-default">
  <div>
    {{-- <a class="navbar-brand" alt="Link to home" href="{{ url('/') }}">
      Sodexo
    </a> --}}

    {{--  @if (session('token_session')) User must be logged in so see menu items --}}
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

            @if (Auth::check())
              <span class="navbar-brand hidden-xs">
                <small class="text-muted">Welcome {{ (Auth::user()->username) }}</small>
              </span>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="{{url('contact')}}" title="Link to contact us"><i class="cs-icon icon-sodexo-phone-blank"></i> Contact us</a>
              </li>
              <li>
                <a href="{{url('help')}}" title="Link to help"><i class="cs-icon icon-sodexo-help"></i> Help</a>
              </li>
                <li>
                    <a href="{{url('message/inbox')}}" title="Link to message inbox"><i class="cs-icon icon-sodexo-help"></i> Inbox</a>
                </li>
              <li>
                @if (Auth::check())
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
                @else
                  <a href="{{url('login')}}" title="Link to login"><i class="cs-icon icon-sodexo-logout"></i> Log In</a>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
    {{-- @endif --}}

  </div>
</nav>
