      <div class="nav-scroller py-1 mb-2">
        <div class="container">
          <nav class="navbar d-flex">
            <a class="p-2 text-muted" href="/lara01/public/posts">Home</a>
            <a class="p-2 text-muted" href="#">New Features</a>
            <a class="p-2 text-muted" href="#">Press</a>
            <a class="p-2 text-muted" href="#">New Hires</a>
            @auth
              <a class="p-2 text-muted ml-auto" href="#">{{ Auth::user()->name }}</a>
              <a class="p-2 text-muted" href="/lara01/public/logout">Log out</a>
            @endauth
            {{--@if (Auth::check())
              <a class="p-2 text-muted ml-auto" href="#">{{ Auth::user()->name }}</a>
              <a class="p-2 text-muted ml-auto" href="/lara01/public/logout">Log out</a>
            @endif--}}
            @guest
              <a class="p-2 text-muted ml-auto" href="/lara01/public/login">Login</a>
              <a class="p-2 text-muted" href="/lara01/public/register">Sign in</a>
            @endguest
          </nav>
        </div>
      </div>