<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('adminlte3/dist/img/user2-160x160.jpg') }}" class="user-image img-circle" alt="User Image">
                <span class="d-none d-md-inline">{{ Auth::user()->nama ?? 'Guest' }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header bg-light">
                    <img src="{{ asset('adminlte3/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    <p>
                        {{ Auth::user()->nama ?? '' }}
                        <div>
                            <small class="badge badge-success">{{ Auth::user()->role ?? '' }}</small>
                        </div>
                    </p>
                </li>
                <li class="user-footer">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn float-right btn-sm btn-outline-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
