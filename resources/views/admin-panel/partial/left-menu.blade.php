<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{ route('admin.dashboard') }}">Inisev Notice Admin</a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{ asset('admin-assets/assets/images/faces/face15.jpg') }}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{ auth()->user()->name }}</h5>
              <span>{{ auth()->user()->type }}</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Menu</span>
      </li>
      <li class="nav-item menu-items {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

    @can('Notice management')
        <li class="nav-item menu-items {{ request()->segment(2) == 'notices' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.notices.manage') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-blur"></i>
                </span>
                <span class="menu-title">Notice</span>
                </a>
            </li>
    @endcan

    @can('User management')
        <li class="nav-item menu-items {{ request()->segment(2) == 'users' ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                <span class="menu-icon">
                    <i class="mdi mdi-account-convert"></i>
                </span>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ request()->segment(2) == 'users' ? 'show' : '' }}" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ request()->segment(3) == 'manage' ? 'active' : '' }}" href="{{ route('admin.users.manage') }}">Users</a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->segment(3) == 'role' ? 'active' : '' }}" href="{{ route('admin.users.role') }}">Roles</a></li>
                </ul>
                </div>
            </li>
    @endcan

    </ul>
  </nav>
