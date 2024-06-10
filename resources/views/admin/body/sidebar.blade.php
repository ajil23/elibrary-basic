<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Library</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="{{'dashboard' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
   
     <!-- Nav Item Collapse Menu -->
     <li class="{{'tampil-peminjaman' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link" href="{{route('peminjaman.tampil')}}">
            <i class="fas fa-solid fa-book"></i>
            <span>Peminjaman</span></a>
    </li>

    <!-- Nav Item Collapse Menu -->
    <li class="{{'tampil-buku' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link" href="{{route('buku.tampil')}}">
            <i class="fas fa-solid fa-book"></i>
            <span>Buku</span></a>
    </li>
    
    <li class="{{'tampil-kategori' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link" href="{{route('kategori.tampil')}}">
            <i class="fas fa-solid fa-layer-group"></i>
            <span>Katergori</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    </ul>
    <!-- End of Sidebar -->
