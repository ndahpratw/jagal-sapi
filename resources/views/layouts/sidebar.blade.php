<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  @if (auth()->user()->role == 'customer')
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a href="{{ url('/pesanan-saya') }}" class="nav-link">
          <i class="bi bi-grid"></i>
          <span>Pesanan Saya</span>
        </a>
      </li>

      <!-- Logout Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Logout Nav -->
    </ul>

  @else      
    <ul class="sidebar-nav" id="sidebar-nav">

      <!-- Dashboard Nav -->
      <li class="nav-item">
        <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if (auth()->user()->role=="admin")
        <!-- Nav -->
        <li class="nav-item">
          <a href="/produk" class="nav-link collapsed">
            <i class="bi bi-basket"></i>
            <span>Katalog Produk</span>
          </a>
        </li><!-- End Nav -->
        
      @endif

      {{-- <!-- Nav -->
      <li class="nav-item">
        <a href="/laporan" class="nav-link collapsed">
          <i class="bi bi-file-earmark-text"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Nav --> --}}

      @if (auth()->user()->role=="admin")
        <!-- Nav -->
        <li class="nav-item">
          <a href="/user" class="nav-link collapsed">
            <i class="bi bi-people-fill"></i>
            <span>User</span>
          </a>
        </li><!-- End Nav -->
        <!-- Nav -->
        <li class="nav-item">
          <a href="/pesanan" class="nav-link collapsed">
            <i class="bi bi-cart"></i>
            <span>Pesanan</span>
          </a>
        </li><!-- End Nav -->
      @endif
  
      <!-- Nav -->
      <li class="nav-item">
        <a href="/jadwal-pemotongan" class="nav-link collapsed">
          <i class="bi bi-calendar-date"></i>
          <span>Jadwal Pemotongan</span>
        </a>
      </li><!-- End Nav -->

      <!-- Logout Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Logout Nav -->

    </ul>
  @endif

</aside><!-- End Sidebar -->
