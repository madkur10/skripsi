@extends('layouts.app')

@section('container')
<div class="card-header">
  <div class="row">
    <div class="col-8 col-sm-8">
      <h4>Daftar Pengguna</h4>
    </div>
    <div class="col-4 col-sm-4 text-end">
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPengguna">
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
          <th class="col text-center">No.</th>
          <th class="col">Nama</th>
          <th class="col">User</th>
          <th class="col">Password</th>
          <th class="col">Terakhir Password Di Perbaharui</th>
          <th class="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse  ($list_pengguna as $user) 
        <tr>
          <td class="text-center">{{ $loop->iteration }}.</td>
          <td>{{ $user->fullname }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->password }}</td>
          <td>{{ date('d-m-Y H:i:s', strtotime($user->last_update_pass)) }}</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ubahPengguna{{ $user->id }}">Ubah</button>
            <div class="modal fade" id="ubahPengguna{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="{{ route('users.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                        <h5 class="modal-title">Ubah Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $user->fullname }}" placeholder="Masukkan Nama Lengkap">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" placeholder="Masukkan Username">
                                </div>
                            </div>  
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                  <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user->id }}">
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
            <a href="{{ route('users.delete', ['id' => $user->id ]) }}" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        @empty
        <td colspan='6'><center><b>Tidak Ada Data</b></center></td>
        @endforelse 
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="tambahPengguna" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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