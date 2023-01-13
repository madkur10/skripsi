@extends('layouts.app')

@section('container')
<div class="card-header">
  <div class="row">
    <div class="col-8 col-sm-8">
      <h4>Daftar Jadwal Dokter</h4>
    </div>
    <div class="col-4 col-sm-4 text-end">
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJadwalDokter">
        + Tambah Jadwal Dokter
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
          <th class="col">Hari</th>
          <th class="col">Jam Mulai</th>
          <th class="col">Jam Selesai</th>
          <th class="col">Kuota</th>
          <th class="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse  ($list_jadwal_dokter as $jadwal_dokter) 
          @if ($jadwal_dokter->hari == '1')
              @php
                  $hari = 'Senin';
              @endphp
          @elseif ($jadwal_dokter->hari == '2')
              @php
                  $hari = 'Selasa';
              @endphp
          @elseif ($jadwal_dokter->hari == '3')
              @php
                  $hari = 'Rabu';
              @endphp
          @elseif ($jadwal_dokter->hari == '4')
              @php
                  $hari = 'Kamis';
              @endphp
          @elseif ($jadwal_dokter->hari == '5')
             @php
                 $hari = 'Jumat';
             @endphp
          @elseif ($jadwal_dokter->hari == '6')
              @php
                  $hari = 'Sabtu';
              @endphp
          @elseif ($jadwal_dokter->hari == '7')
              @php
                  $hari = 'Minggu';
              @endphp
          @endif
        <tr>
          <td class="text-center">{{ $loop->iteration }}.</td>
          <td>{{ $jadwal_dokter->nama_dokter }}</td>
          <td>{{ $jadwal_dokter->nama_klinik }}</td>
          <td>{{ $hari }}</td>
          <td>{{ $jadwal_dokter->jam_mulai }}</td>
          <td>{{ $jadwal_dokter->jam_selesai }}</td>
          <td>{{ $jadwal_dokter->kuota }}</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ubahJadwalDokter{{ $jadwal_dokter->id }}">Ubah</button>
            <div class="modal fade" id="ubahJadwalDokter{{ $jadwal_dokter->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="{{ route('jadwaldokter.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                        <h5 class="modal-title">Ubah Jadwal Dokter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="user" class="col-sm-2 col-form-label">Nama Dokter</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="dokter_id">
                                        <option selected>--- Pilih Dokter ---</option>
                                        @foreach ($list_dokter as $dokter)
                                        <option value="{{ $dokter->id }}" @if ($jadwal_dokter->dokter_id == $dokter->id) selected @endif>{{ $dokter->nama_dokter }}</option>
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
                                <label for="dokter" class="col-sm-2 col-form-label">Hari</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="hari">
                                        <option selected>--- Pilih Hari ---</option>
                                        <option value="1" @if ($jadwal_dokter->hari == '1') selected @endif>Senin</option>
                                        <option value="2" @if ($jadwal_dokter->hari == '2') selected @endif>Selasa</option>
                                        <option value="3" @if ($jadwal_dokter->hari == '3') selected @endif>Rabu</option>
                                        <option value="4" @if ($jadwal_dokter->hari == '4') selected @endif>Kamis</option>
                                        <option value="5" @if ($jadwal_dokter->hari == '5') selected @endif>Jum'at</option>
                                        <option value="6" @if ($jadwal_dokter->hari == '6') selected @endif>Sabtu</option>
                                        <option value="7" @if ($jadwal_dokter->hari == '7') selected @endif>Minggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="dokter" class="col-sm-2 col-form-label">Kuota</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="dokter" name="kuota" value="{{ $jadwal_dokter->kuota }}" placeholder="Masukkan Kuota">
                                    <input type="hidden" class="form-control" id="dokter" name="jadwal_dokter_id" value="{{ $jadwal_dokter->id }}">
                                </div>
                            </div> 
                            <div class="mb-3 row">
                                <label for="dokter" class="col-sm-2 col-form-label">Jam Mulai</label>
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" id="dokter" name="jam_mulai" value="{{ $jadwal_dokter->jam_mulai }}">
                                </div>
                            </div> 
                            <div class="mb-3 row">
                                <label for="dokter" class="col-sm-2 col-form-label">Jam Selesai</label>
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" id="dokter" name="jam_selesai" value="{{ $jadwal_dokter->jam_selesai }}">
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
            <a href="{{ route('dokter.delete', ['id' => $jadwal_dokter->id ]) }}" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        @empty
        <td colspan='8'><center><b>Tidak Ada Data</b></center></td>
        @endforelse 
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="tambahJadwalDokter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('jadwaldokter.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Jadwal Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3 row">
                <label for="user" class="col-sm-2 col-form-label">Nama Dokter</label>
                <div class="col-sm-10">
                    <select class="form-select" name="dokter_id">
                        <option selected>--- Pilih Dokter ---</option>
                        @foreach ($list_dokter as $dokter)
                        <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>
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
                <label for="dokter" class="col-sm-2 col-form-label">Hari</label>
                <div class="col-sm-10">
                    <select class="form-select" name="hari">
                        <option selected>--- Pilih Hari ---</option>
                        <option value="1">Senin</option>
                        <option value="2">Selasa</option>
                        <option value="3">Rabu</option>
                        <option value="4">Kamis</option>
                        <option value="5">Jum'at</option>
                        <option value="6">Sabtu</option>
                        <option value="7">Minggu</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="dokter" class="col-sm-2 col-form-label">Kuota</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="dokter" name="kuota" placeholder="Masukkan Kuota">
                </div>
            </div> 
            <div class="mb-3 row">
                <label for="dokter" class="col-sm-2 col-form-label">Jam Mulai</label>
                <div class="col-sm-5">
                    <input type="time" class="form-control" id="dokter" name="jam_mulai">
                </div>
            </div> 
            <div class="mb-3 row">
                <label for="dokter" class="col-sm-2 col-form-label">Jam Selesai</label>
                <div class="col-sm-5">
                    <input type="time" class="form-control" id="dokter" name="jam_selesai">
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