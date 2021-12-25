@extends('layouts.app')

@section('container')
<div class="card-header">
  <div class="row">
    <div class="col-8 col-sm-8">
      <h4>Daftar Klinik</h4>
    </div>
    <div class="col-4 col-sm-4 text-end">
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKlinik">
        + Tambah Klinik
      </button>
    </div>
  </div>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col text-center">No.</th>
          <th scope="col">Nama Klinik</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($list_klinik as $klinik) 
        <tr>
          <td class="text-center">{{ $loop->iteration }}.</td>
          <td>{{ $klinik->nama_klinik }}</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ubahKlinik{{ $klinik->id }}">Ubah</button>
            <div class="modal fade" id="ubahKlinik{{ $klinik->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="{{ route('clinic.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                        <h5 class="modal-title">Ubah Klinik</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="klinik" class="col-sm-2 col-form-label">Nama Klinik</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="klinik" name="nama_klinik" value="{{ $klinik->nama_klinik }}" placeholder="Masukkan Nama Klinik">
                                <input type="hidden" class="form-control" name="klinik_id" value="{{ $klinik->id }}">
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
            <a href="{{ route('clinic.delete', ['id' => $klinik->id ]) }}" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        @empty
        <td colspan='3'><center><b>Tidak Ada Data</b></center></td>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="tambahKlinik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('clinic.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Klinik</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3 row">
            <label for="nama_klinik" class="col-sm-2 col-form-label">Nama Klinik</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_klinik" name="nama_klinik" value="{{ old('nama_klinik') }}" placeholder="Masukkan Nama Klinik">
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