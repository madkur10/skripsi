@extends('layouts.app')

@section('container')
<div class="card-header">
  <div class="row">
    <div class="col-8 col-sm-8">
      <h4>Daftar Menu</h4>
    </div>
    <div class="col-4 col-sm-4 text-end">
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMenu">
        + Tambah Menu
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
          <th class="col">Nama Modul</th>
          <th class="col">Nama Menu</th>
          <th class="col">Route</th>
          <th class="col">Urutan</th>
          <th class="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse  ($list_menu as $menu) 
        <tr>
          <td class="text-center">{{ $loop->iteration }}.</td>
          <td>{{ $menu->nama_modul }}</td>
          <td>{{ $menu->nama_menu }}</td>
          <td>{{ $menu->nama_route }}</td>
          <td>{{ $menu->urutan }}</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ubahMenu{{ $menu->id }}">Ubah</button>
            <div class="modal fade" id="ubahMenu{{ $menu->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="{{ route('menu.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                        <h5 class="modal-title">Ubah Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="menu" class="col-sm-2 col-form-label">Nama Modul</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="modul_id">
                                        <option selected>--- Pilih Modul ---</option>
                                        @foreach ($list_modul as $modul)
                                        <option value="{{ $modul->id }}" @if ($menu->modul_id == $modul->id) selected @endif>{{ $modul->nama_modul }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="menu" class="col-sm-2 col-form-label">Nama Menu</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="menu" name="nama_menu" value="{{ $menu->nama_menu }}" placeholder="Masukkan Nama Menu">
                                </div>
                            </div>  
                            <div class="mb-3 row">
                                <label for="menu" class="col-sm-2 col-form-label">Nama Route</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="menu" name="nama_route" value="{{ $menu->nama_route }}" placeholder="Masukkan Nama Route">
                                </div>
                            </div>  
                            <div class="mb-3 row">
                                <label for="urutan" class="col-sm-2 col-form-label">Urutan Menu</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="urutan" name="urutan" value="{{ $menu->urutan }}" placeholder="Masukkan Urutan Menu">
                                <input type="hidden" class="form-control" id="menu_id" name="menu_id" value="{{ $menu->id }}">
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
            <a href="{{ route('menu.delete', ['id' => $menu->id ]) }}" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        @empty
        <td colspan='6'><center><b>Tidak Ada Data</b></center></td>
        @endforelse 
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="tambahMenu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3 row">
            <label for="modul" class="col-sm-2 col-form-label">Nama Modul</label>
            <div class="col-sm-10">
                <select class="form-select" name="modul_id">
                    <option selected>--- Pilih Modul ---</option>
                    @foreach ($list_modul as $modul)
                    <option value="{{ $modul->id }}">{{ $modul->nama_modul }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="menu" class="col-sm-2 col-form-label">Nama Menu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="menu" name="nama_menu" value="{{ old('nama_menu') }}" placeholder="Masukkan Nama Menu">
            </div>
          </div>  
          <div class="mb-3 row">
            <label for="route" class="col-sm-2 col-form-label">Nama Route</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="route" name="nama_route" value="{{ old('nama_route') }}" placeholder="Masukkan Nama Route">
            </div>
          </div>  
          <div class="mb-3 row">
            <label for="urutan" class="col-sm-2 col-form-label">Urutan Menu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="urutan" name="urutan" value="{{ old('urutan') }}" placeholder="Masukkan Urutan Menu">
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