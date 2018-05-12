<header>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                     <h2 align="left">Restaurant Transaction System</h2>
                </div>
                <div class="col-md-6">
                     Welcome {{ Auth::user()->name }} <br>
                     <a href="{{ route('logout') }}" btn-sm onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>

            </div>
        </div>
</header>

 <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
  
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="active" href="/home">Dashboard</a></li>
                            <li><a class="{{ Request::is('/index') ? "active" : "" }}" href="{{ route('menus.index')}}">Menu List</a></li>
                            <li><a href="{{ route('menus.create')}}">Create New Menu</a></li>
                            <li><a href="{{ route('categories.index')}}">Categories</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
   