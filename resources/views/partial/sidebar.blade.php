<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="/template/index3.html" class="brand-link">
        <img src="/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @auth
                    <a href="{{ route('profile.edit') }}" class="d-block">{{ Auth::user()->name }}</a>
                @else
                    <span class="d-block text-white ml-2">Guest</span>
                @endauth
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard-data') }}" class="nav-link">
                        <i class="nav-icon fas fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('film.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                            Film
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('genre.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-theater-masks"></i>
                        <p>
                            Genre
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cast.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Cast
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('film_cast.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Cast of Film
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('review.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Review
                        </p>
                    </a>
                </li>
                @auth
                @else
                    <li class="nav-item mb-2">
                        <a href="{{ route('login') }}"><button type="button"
                                class="nav-link rounded bg-primary border-0 mr-2">Login</button></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}"><button type="button"
                                class="nav-link rounded bg-primary border-0">Register</button></a>
                    </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
