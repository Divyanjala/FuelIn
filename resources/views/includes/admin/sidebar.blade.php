 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon ">
             <img src="{{ asset('img/logo.png') }}" alt="" height="80px" width="80px">
         </div>
         <div class="sidebar-brand-text mx-3">Admin </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ in_array($curr_url, ['admin.dashboard']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}"  >
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
     <li class="nav-item {{ in_array($curr_url, ['admin.station','admin.station.new']) ? 'active' : '' }}">
         <a class="nav-link collapsed" href="{{ route('admin.station') }}"  >
             <i class="fas fa-fw fa-gas-pump"></i>
             <span>Fuel Stations</span>
         </a>
     </li>
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item {{ in_array($curr_url, ['admin.distribution','admin.distribution.new']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.distribution') }}"  >
            <i class="fas fa-fw fa-truck-field"></i>
            <span>Fuel Distibution</span>
        </a>
    </li>
          <!-- Heading -->
     <div class="sidebar-heading">
         Setting
     </div>
     <li class="nav-item {{ in_array($curr_url, ['admin.fuel-type','admin.fuel-type.new']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.fuel-type') }}"  >
            <i class="fas fa-fw fa-file"></i>
            <span>Fuel Type</span>
        </a>
    </li>
    <li class="nav-item {{ in_array($curr_url, ['admin.vehical-type']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.vehical-type') }}"  >
            <i class="fas fa-fw fa-bus"></i>
            <span>Vehical Type</span>
        </a>
    </li>
     <!-- Nav Item - Pages Collapse Menu -->
     {{-- <li class="nav-item {{ in_array($curr_url, ['admin.fine.all']) ? 'active' : '' }}">
         <a class="nav-link collapsed" href="{{ route('admin.fine.all') }}">
             <i class="fas fa-fw fa-file-lines"></i>
             <span>Fine</span>
         </a>

     </li> --}}
     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>



 </ul>
 <!-- End of Sidebar -->
