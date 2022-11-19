<!-- Topbar -->
<nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light topbar static-top">
    <div class="mr-4 lead"><b>@yield('heading')</b></div>

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="mr-auto navbar-nav">

        <div class="topbar-divider d-none d-sm-block"></div>



        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">
                <span class="mr-2 text-gray-600 d-none d-lg-inline small">{{ auth()->user()->name }}</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="shadow dropdown-menu dropdown-menu-left animated--grow-in" style="right:-90px">
                <a class="text-right dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="mr-2 text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
                    تسجيل خروج
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
