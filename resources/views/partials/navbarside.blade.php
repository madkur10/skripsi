<main>
  <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none border-bottom justify-content-center bg-primary text-white">
      <div class="p-2" style="max-width: 18rem;">
        <span class="fs-5 fw-semibold text-center"><h3>TELEMEDICINE</h3></span>
      </div>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="{{ ($menu_aktif == 'administrator') ? 'true' : 'false' }}">
          Administrator
        </button>
        <div class="collapse {{ ($menu_aktif == 'administrator') ? 'show' : '' }}" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded {{ ($sub_menu_aktif == 'bagian') ? 'active' : '' }}">Bagian</a></li>
            <li><a href="{{ route('list.users') }}" class="link-dark rounded {{ ($sub_menu_aktif == 'pengguna') ? 'active' : '' }}">Pengguna</a></li>
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
</main>
