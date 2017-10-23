<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="../posts">Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          @if(Auth::check())
            <ul class="nav navbar-nav">
                <li><a href="/posts/create">New Post</a></li>
            </ul>
            @endif
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
              
              {!! Form::open(['route' => 'logout', 'method' => 'POST']) !!}
                  <div class="links">
                      <li><a><button type="submit" class="logout">Logout</button></a></li>
                  </div>
              {!! Form::close() !!}

            @else
              <li><a href="../login">Log In</a></li>
              <li><a href="../register">Register</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>