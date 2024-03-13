<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a href="/" class="navbar-brand">
            ABC Corps
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#togg" aria-controls="togg"
            aria-expanded="false" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="togg">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('client.dashboard') ? ' active' : '' }}"
                        href="{{ route('client.dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('client.project') ? ' active' : '' }}"
                        href="{{ route('client.project') }}">Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('client.payment') ? ' active' : '' }}"
                        href="{{ route('client.payment') }}">Payment</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? ' active' : '' }}"
                        href="{{ route('client.account') }}">Akun</a>
                </li>
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                            ,{{ Auth::user()->name }} ( @if (Auth::user()->is_admin == 1)
                                ADMIN
                            @else
                                CLIENT
                            @endif)</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a class="nav-link {{ Request::is('login') ? ' active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    @endauth
                </li>
            </ul>
        </div>

    </div>
</nav>
