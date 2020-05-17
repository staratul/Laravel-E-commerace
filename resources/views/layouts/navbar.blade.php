<nav class="site-header sticky-top py-2">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
      <a class="py-2" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
      </a>
      <a class="py-2 d-none d-md-inline-block" href="{{ url('/') }}">Home</a>
      <a class="py-2 d-none d-md-inline-block" href="#">About</a>
      <a class="py-2 d-none d-md-inline-block" href="#">Contact</a>
      <a class="py-2 d-none d-md-inline-block" href="#">Category</a>
        @guest
            <a class="py-2 d-none d-md-inline-block" href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
                <a class="py-2 d-none d-md-inline-block" href="{{ route('register') }}">Signup</a>
            @endif
        @else
        {{-- <li class="nav-item"> --}}
            <a id="navbarDropdown" class="nav-link dropdown dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        {{-- </li> --}}
        @endguest
      <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
    </div>
  </nav>
