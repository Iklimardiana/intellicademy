<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">
            <h1><span>Intelli</span>Cademy</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/" style="{{ request()->is('/') ? 'font-weight: bold;' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/courses" style="{{ request()->is('courses') ? 'font-weight: bold;' : '' }}">Courses</a>
                </li>
                @auth
                    <li class="nav-item">
                        @if (Auth::user()->role == '1')
                                <a class="nav-link" href="/teacher" style="{{ request()->is('teacher') ? 'font-weight: bold;' : '' }}">
                                    Dashboard
                                </a>
                        @elseif (Auth::user()->role == '2')
                            <a class="nav-link" href="/student" style="{{ request()->is('student') ? 'font-weight: bold;' : '' }}">
                                Dashboard
                            </a>
                        @else
                            <a class="nav-link" href="/admin" style="{{ request()->is('admin') ? 'font-weight: bold;' : '' }}">
                                Dashboard
                            </a>
                        @endif
                    </li>
                @endauth
            </ul>
            @auth
                <div class="nav-item dropdown d-flex me-4">
                    Hello, <b class="ms-1">{{ Auth::user()->username }}</b>
                </div>
                <div class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i data-feather="user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            @if (Auth::user()->role == '1')
                                <form action="/teacher">
                                    <button class="dropdown-item">
                                        Dashboard
                                    </button>
                                </form>
                            @elseif (Auth::user()->role == '2')
                                <form action="/student">
                                    <button class="dropdown-item">
                                        Dashboard
                                    </button>
                                </form>
                            @else
                                <form action="/admin">
                                    <button class="dropdown-item">
                                        Dashboard
                                    </button>
                                </form>
                            @endif
                        </li>
                        <li>
                            @if (Auth::user()->role == '1')
                                <form action="/teacher/profile/{{ Auth::user()->id }}">
                                    <button class="dropdown-item">
                                        Profile
                                    </button>
                                </form>
                            @elseif (Auth::user()->role == '2')
                                <form action="/student/profile/{{ Auth::user()->id }}">
                                    <button class="dropdown-item">
                                        Profile
                                    </button>
                                </form>
                            @endif
                        </li>
                        @if (Auth::user()->role == '2')
                            <li>
                                <form action="/student/transaction">
                                    <button class="dropdown-item">
                                        Transaction
                                    </button>
                                </form>
                            </li>
                        @endif
                        <hr>
                        <li>
                            <form action="/logout">
                                <button class="dropdown-item" type="submit">
                                    <!-- <i data-feather="log-out"></i> -->
                                    Sign Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
                <div class="nav-item dropdown d-flex">
                    @unless (Request::is('login') || Request::is('register'))
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="login" href="/login">Login</a>
                            </li>
                        </ul>
                    @endunless
                </div>
            @endguest
        </div>
</nav>
