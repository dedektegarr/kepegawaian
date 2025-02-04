<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>

        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <div style="display: flex; gap:.5rem; justify-content:center; align-items:center">
                <h6>{{ Auth::user()->name }} <span class="badge bg-primary">{{ Auth::user()->role }}</span></h6>

                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Anda yakin ingin logout?')">Logout</button>
                </form>
            </div>
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
