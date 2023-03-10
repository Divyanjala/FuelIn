<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
            <img src="{{ asset('img/logo.png') }}" alt="" height="80px" width="80px">
        </div>
        <div class="sidebar-brand-text mx-3">Station </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ in_array($curr_url, ['station.dashboard']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('station.dashboard') }}"  >
            <i class="fas fa-fw fa-house"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ in_array($curr_url, ['station.customers']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('station.customers') }}"  >
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
    </li>

    <li class="nav-item {{ in_array($curr_url, ['station.request.all']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('station.request.all') }}"  >
            <i class="fas fa-fw fa-address-card"></i>
            <span>Customers Request</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ in_array($curr_url, ['station.distribution','station.distribution.new']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('station.distribution') }}"  >
            <i class="fas fa-fw fa-truck-field"></i>
            <span>Fuel Distibution</span>
        </a>
    </li>
              <!-- Heading -->
     <div class="sidebar-heading">
         Setting
     </div>
     <li class="nav-item {{ in_array($curr_url, ['station.reshedule']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('station.reshedule') }}"  >
            <i class="fas fa-fw fa-file"></i>
            <span>Reshedule</span>
        </a>
    </li>
    <li class="nav-item {{ in_array($curr_url, ['station.notification']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('station.notification') }}"  >
            <i class="fas fa-fw fa-bell"></i>
            <span>Notification Manage</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
