      <div class="nav-scroller py-1 mb-2">
        <div class="container">
        <nav class="nav d-flex">
          <a class="p-2 text-muted" href="/lara01/public/posts">Home</a>
          <a class="p-2 text-muted" href="#">New Features</a>
          <a class="p-2 text-muted" href="#">Press</a>
          <a class="p-2 text-muted" href="#">New Hires</a>
          @if (Auth::check())
            <a class="p-2 text-muted ml-auto" href="#">{{ Auth::user()->name }}</a>
          @endif          
        </nav>
        </div>
      </div>