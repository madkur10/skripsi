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
            <li><a href="#" class="link-dark rounded {{ ($sub_menu_aktif == 'bagian') ? 'active' : '' }}">Bagian</a></li>
            <li><a href="{{ route('users.list') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'pengguna') ? 'active' : '' }}">Pengguna</a></li>
            <li><a href="#" class="link-dark rounded {{ ($sub_menu_aktif == 'profesi') ? 'active' : '' }}">Profesi</a></li>
            <li><a href="#" class="link-dark rounded {{ ($sub_menu_aktif == 'jadwal_dokter') ? 'active' : '' }}">Jadwal Dokter</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="{{ ($menu_aktif == 'account') ? 'true' : 'false' }}">
          Account
        </button>
        <div class="collapse {{ ($menu_aktif == 'account') ? 'show' : '' }}" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded {{ ($menu_aktif == 'administrator') ? 'true' : 'false' }}">New...</a></li>
            <li><a href="#" class="link-dark rounded {{ ($menu_aktif == 'administrator') ? 'true' : 'false' }}">Profile</a></li>
            <li><a href="#" class="link-dark rounded {{ ($menu_aktif == 'administrator') ? 'true' : 'false' }}">Settings</a></li>
            <li><a href="#" class="link-dark rounded {{ ($menu_aktif == 'administrator') ? 'true' : 'false' }}">Sign out</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
  