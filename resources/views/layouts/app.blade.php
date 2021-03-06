<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Restaurant Transaction System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
   
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                </div>
            </div>
        </div>
    </header>
    
   
    <!-- MENU SECTION END-->
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Restaurant Transaction System </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                   @yield('content')
                </div>
            </div>
        </div>
  
  
    <script src="{{ asset('js/jquery-1.11.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
