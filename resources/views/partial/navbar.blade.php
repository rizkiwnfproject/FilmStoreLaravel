<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link rounded bg-danger border-0">Logout</button>
            </form>
        @endauth
    </ul>
</nav>
