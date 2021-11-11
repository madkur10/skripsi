@extends('layouts.app')

@section('container')
<div class="card-header">
  <div class="row">
    <div class="col-md-8">
      <h4>Daftar Pengguna</h4>
    </div>
    <div class="col-md-4 text-end">
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        + Tambah Pengguna
      </button>
    </div>
  </div>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">User</th>
          <th scope="col">Password</th>
          <th scope="col">Profesi</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($list_pengguna as $user) 
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->fullname }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->password }}</td>
          <td>{{ $user->profesi_id }}</td>
          <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3 row">
            <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fullname" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan Nama Lengkap">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" value="{{ old('user_name') }}" name="user_name" placeholder="Masukkan Username">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="password" value="{{ old('password') }}" name="password" placeholder="Masukkan Password">
            </div>
          </div> 
          <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Profesi</label>
            <div class="col-sm-10">
              <select class="form-select form-select" name="profesi_id">
                <option selected>--- Pilih Profesi ---</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="3">4</option>
              </select>
            </div>
          </div>        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection