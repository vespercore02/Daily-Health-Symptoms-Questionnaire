<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            DHSQ
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon">DHSQ</span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            @guest
                <li class="nav-item">
                  <a class="nav-link" href="/employees">Employee</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/visitors">Visitor</a>
                </li>
            @else
                @switch( Auth::user()->role)
                    @case('Admin')
                    <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/accounts">Accounts</a>
                    </li>
                    @break

                    @default
                    <li class="nav-item">
                        <a class="nav-link" href="/employees/list">Employee List</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/monitor">Health Monitor</a>
                    </li>
                    @endswitch
            @endguest

              </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-bell"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                Notify
                            </li>
                        </ul>
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>