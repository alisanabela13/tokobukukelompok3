<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand mt-2 mb-3">
          <a href="{{route('home')}}" class="site_title">
            {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="logo thortech project" class="img-fluid" style="height: 3rem;"> --}}
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        {{-- <a href="{{route('home')}}"><img src="{{asset('img/landingpage/logo.png')}}"  width="50px" alt=""></a> --}}
      </div>
      <br/>
      <ul class="sidebar-menu">
  
        <li class="menu-header">MENU UTAMA</li>
        <li class="nav-item {{Request::segment(1)=='home' ?'active':''}}" ><a class="nav-link" href="{{route('home')}}" aria-expanded="false"><i class="fas fa-home"></i> <span>Home</span></a></li>
        <li class="nav-item  {{Request::segment(1)=='datauser' ?'active':''}}"><a class="nav-link" href="{{route('user')}}" aria-expanded="false"><i class="fas fa-users"></i> <span>User</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-user"></i><span>Karyawan</span></a></li>
        <li class="menu-header">MANAJEMEN BUKU</li>
        <li class="nav-item  {{Request::segment(1)=='databuku' ?'active':''}}"><a class="nav-link" href="{{route('buku')}}" aria-expanded="false"><i class="fas fa-book"></i> <span>Data Buku</span></a></li>
        <li class="nav-item  {{Request::segment(1)=='penulis' ?'active':''}}"><a class="nav-link" href="{{route('penulis')}}" aria-expanded="false"><i class="fas fa-user-edit"></i><span>Penulis Buku</span></a></li>
        <li class="nav-item  {{Request::segment(1)=='penerbit' ?'active':''}}"><a class="nav-link" href="{{route('penerbit')}}" aria-expanded="false"><i class="fas fa-building"></i></i><span>Penerbit Buku</span></a></li>
        <li class="nav-item  {{Request::segment(1)=='Kategori' ?'active':''}}"><a class="nav-link" href="{{route('Kategori')}}" aria-expanded="false"><i class="fas fa-swatchbook"></i></i><span>Jenis Buku</span></a></li>
        <li class="nav-item  {{Request::segment(1)=='Pemasok' ?'active':''}}"><a class="nav-link" href="{{route('Pemasok')}}" aria-expanded="false"><i class="fas fa-truck-moving"></i></i><span>Pemasok Buku</span></a></li><hr>
        
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-dollar-sign"></i><span>Transaksi</span></a></li>
        
        

  
    </aside>
  </div>
