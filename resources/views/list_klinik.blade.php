@extends('layouts.app')

@section('container')
<div class="card-header">
  <div class="row">
    <div class="col-8 col-sm-8">
      <h4>Daftar Klinik</h4>
    </div>
    <div class="col-4 col-sm-4 text-end">
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
        @foreach ($list_pengguna as $user) 
        <tr>
          <td class="text-center">{{ $loop->iteration }}.</td>
          <td>{{ $user->nama_klinik }}</td>
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