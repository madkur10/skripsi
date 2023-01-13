@extends('layouts.app')

@section('container')
<div class="card-header">
  <div class="row">
    <div class="col-8 col-sm-8">
      <h4>Daftar Dokter</h4>
    </div>
    <div class="col-4 col-sm-4 text-end">
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDokter">
        + Tambah Dokter
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
          <th class="col">Nama Dokter</th>
          <th class="col">Nama Klinik</th>
          <th class="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse  ($list_dokter as $dokter) 
        <tr>
          <td class="text-center">{{ $loop->iteration }}.</td>
          <td>{{ $dokter->nama_dokter }}</td>
          <td>{{ $dokter->nama_klinik }}</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ubahDokter{{ $dokter->id }}">Ubah</button>
            <div class="modal fade" id="ubahDokter{{ $dokter->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="{{ route('dokter.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                        <h5 class="modal-title">Ubah Dokter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="user" class="col-sm-2 col-form-label">Nama Pengguna</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="user_id">
                                        <option selected>--- Pilih Pengguna ---</option>
                                        @foreach ($list_users as $users)
                                        <option value="{{ $users->id }}" @if ($dokter->user_id == $users->id) selected @endif>{{ $users->fullname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="klinik" class="col-sm-2 col-form-label">Nama Klinik</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="klinik_id">
                                        <option selected>--- Pilih Klinik ---</option>
                                        @foreach ($list_klinik as $klinik)
                                        <option value="{{ $klinik->id }}" @if ($dokter->klinik_id == $klinik->id) selected @endif>{{ $klinik->nama_klinik }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="dokter" name="nama_dokter" value="{{ $dokter->nama_dokter }}" placeholder="Masukkan Nama Dokter">
                                <input type="hidden" class="form-control" id="dokter" name="dokter_id" value="{{ $dokter->id }}">
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
            <a href="{{ route('dokter.delete', ['id' => $dokter->id ]) }}" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        @empty
        <td colspan='6'><center><b>Tidak Ada Data</b></center></td>
        @endforelse 
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="tambahDokter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3 row">
                <label for="user" class="col-sm-2 col-form-label">Nama Pengguna</label>
                <div class="col-sm-10">
                    <select class="form-select" name="user_id">
                        <option selected>--- Pilih Pengguna ---</option>
                        @foreach ($list_users as $users)
                        <option value="{{ $users->id }}">{{ $users->fullname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="klinik" class="col-sm-2 col-form-label">Nama Klinik</label>
                <div class="col-sm-10">
                    <select class="form-select" name="klinik_id">
                        <option selected>--- Pilih Klinik ---</option>
                        @foreach ($list_klinik as $klinik)
                        <option value="{{ $klinik->id }}">{{ $klinik->nama_klinik }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="dokter" name="nama_dokter" value="{{ old('nama_dokter') }}" placeholder="Masukkan Nama Dokter">
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