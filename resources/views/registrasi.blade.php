@extends('layouts.plain')

@section('container')
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="row col-12"> <img src="img/header.png"></div>
            <div class="my-1"><hr></div>
            <div class="row mb-2 mt-2 px-3 text-center">
                <h4>Registrasi Telemedicine - Rs Pelni</h4>
            </div>
            <div class="card-body">
                <div class="col-12 col-sm-6 p-3">
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="ktp" class="form-label form-regis">Nomor Identitas (NIK / Paspor / No.KK)</label>
                            <input type="text" class="form-control form-control-sm" id="ktp" placeholder="Masukkan No. Identitas">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label form-regis">Nama Lengkap (Sesuai Kartu Identitas)</label>
                            <input type="text" class="form-control form-control-sm" id="nama" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label form-regis">Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                              </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">1</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">2</label>
                          </div>
                        <div class="form-group mb-3">
                            <label for="ktp" class="form-label form-regis">Nomor Identitas (NIK / Paspor / No.KK)</label>
                            <input type="text" class="form-control form-control-sm" id="ktp" placeholder="Masukkan No. Identitas">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ktp" class="form-label form-regis">Nomor Identitas (NIK / Paspor / No.KK)</label>
                            <input type="text" class="form-control form-control-sm" id="ktp" placeholder="Masukkan No. Identitas">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-blue py-2">
            <div class="row px-3 text-center"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
</div>
@endsection