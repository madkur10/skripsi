<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="{{ ($menu_aktif == 'administrator') ? 'true' : 'false' }}">
          Administrator
        </button>
        <div class="collapse {{ ($menu_aktif == 'administrator') ? 'show' : '' }}" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('users.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'pengguna') ? 'active' : '' }}">Pengguna</a></li>
            <li><a href="{{ route('clinic.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'klinik') ? 'active' : '' }}">Klinik</a></li>
            <li><a href="{{ route('jadwaldokter.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'jadwal_dokter') ? 'active' : '' }}">Jadwal Dokter</a></li>
            <li><a href="{{ route('modul.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'modul') ? 'active' : '' }}">Modul</a></li>
            <li><a href="{{ route('menu.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'menu') ? 'active' : '' }}">Menu</a></li>
            <li><a href="{{ route('dokter.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'dokter') ? 'active' : '' }}">Dokter</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#registrasi-collapse" aria-expanded="{{ ($menu_aktif == 'registrasi') ? 'true' : 'false' }}">
          Registrasi
        </button>
        <div class="collapse {{ ($menu_aktif == 'registrasi') ? 'show' : '' }}" id="registrasi-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('users.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'pengguna') ? 'active' : '' }}">Pengguna</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dokter-collapse" aria-expanded="{{ ($menu_aktif == 'dokter') ? 'true' : 'false' }}">
          Dokter
        </button>
        <div class="collapse {{ ($menu_aktif == 'dokter') ? 'show' : '' }}" id="dokter-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('users.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'pengguna') ? 'active' : '' }}">Pengguna</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#kasir-collapse" aria-expanded="{{ ($menu_aktif == 'kasir') ? 'true' : 'false' }}">
          Kasir
        </button>
        <div class="collapse {{ ($menu_aktif == 'kasir') ? 'show' : '' }}" id="kasir-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('users.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'pengguna') ? 'active' : '' }}">Pengguna</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="{{ ($menu_aktif == 'account') ? 'true' : 'false' }}">
          Akun
        </button>
        <div class="collapse {{ ($menu_aktif == 'account') ? 'show' : '' }}" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded {{ ($menu_aktif == 'administrator') ? 'true' : 'false' }}">Profile</a></li>
            <li><a href="#" class="link-dark rounded {{ ($menu_aktif == 'administrator') ? 'true' : 'false' }}">Settings</a></li>
            <li><a href="{{ route('logout.action') }}" class="link-dark rounded {{ ($menu_aktif == 'administrator') ? 'true' : 'false' }}">Keluar</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
  