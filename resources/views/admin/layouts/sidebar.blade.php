<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">Rental</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="">Rental</a>
      </div>
      <ul class="sidebar-menu">
        {{-- dinamic active state untuk class active --}}
        <li class="@if (Request::segment(1) == 'admin' and Request::segment(2) == 'dashboard') active @endif">
          <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        </li>
          <li class="menu-header">Menu</li>
          {{-- dinamic active state untuk class active --}}
          <li class="@if (Request::segment(2) == 'mobil') active @endif"><a href="{{ route('mobil.index')}}" class="nav-link" href=><i class="fas fa-gifts"></i> <span>Mobil</span></a></li>
       
          <li class="@if (Request::segment(2) == 'role') active @endif"><a href="{{ route('role.index')}}" class="nav-link"><i class="fas fa-key"></i><span>Role</span></a></li>
          <li class="@if (Request::segment(2) == 'user') active @endif"><a href="{{ route('user.index')}}" class="nav-link"><i class="fas fa-key"></i><span>Admin</span></a></li>
     
        </ul>
    </aside>
  </div>