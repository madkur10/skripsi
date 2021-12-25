@extends('layouts.app')

@section('container')
<div class="card-header">
  <div class="row">
    <div class="col-8 col-sm-8">
      <h4>Daftar Modul</h4>
    </div>
    <div class="col-4 col-sm-4 text-end">
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModul">
        + Tambah Modul
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
          <th class="col">Urutan</th>
          <th class="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse  ($list_moduls as $modul) 
        <tr>
          <td class="text-center">{{ $loop->iteration }}.</td>
          <td>{{ $modul->nama_modul }}</td>
          <td>{{ $modul->urutan }}</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ubahModul{{ $modul->id }}">Ubah</button>
            <div class="modal fade" id="ubahModul{{ $modul->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="{{ route('modul.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                        <h5 class="modal-title">Ubah Modul</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="modul" class="col-sm-2 col-form-label">Nama Modul</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="modul" name="nama_modul" value="{{ $modul->nama_modul }}" placeholder="Masukkan Nama Modul">
                            </div>
                        </div>  
                        <div class="mb-3 row">
                            <label for="urutan" class="col-sm-2 col-form-label">Urutan Modul</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="urutan" name="urutan" value="{{ $modul->urutan }}" placeholder="Masukkan Urutan Modul">
                            <input type="hidden" class="form-control" id="modul_id" name="modul_id" value="{{ $modul->id }}">
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
            <a href="{{ route('modul.delete', ['id' => $modul->id ]) }}" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        @empty
        <td colspan='6'><center><b>Tidak Ada Data</b></center></td>
        @endforelse 
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="tambahModul" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('modul.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Modul</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3 row">
            <label for="modul" class="col-sm-2 col-form-label">Nama Modul</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="modul" name="nama_modul" value="{{ old('nama_modul') }}" placeholder="Masukkan Nama Modul">
            </div>
          </div>  
          <div class="mb-3 row">
            <label for="urutan" class="col-sm-2 col-form-label">Urutan Modul</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="urutan" name="urutan" value="{{ old('urutan') }}" placeholder="Masukkan Urutan Modul">
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