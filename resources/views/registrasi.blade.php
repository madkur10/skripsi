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
                <form action="{{ route('registrasi.action') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-5 ms-3 me-3">
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="ktp" class="form-label form-regis">Nomor Identitas (NIK / Paspor / No.KK)</label>
                                    <input type="text" class="form-control form-control-sm" id="ktp" name="ktp" maxlength="20" value="{{ old('ktp') }}" placeholder="Masukkan No. Identitas">
                                    @error('ktp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nama" class="form-label form-regis">Nama Lengkap (Sesuai Kartu Identitas)</label>
                                    <input type="text" class="form-control form-control-sm" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan Nama Lengkap">
                                    @error('nama_lengkap')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="nama" class="form-label form-regis">Jenis Kelamin</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox1" name="jenis_kelamin" value="L" @if( old('jenis_kelamin')=='Laki-laki') checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox1">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox2" name="jenis_kelamin" value="P" @if( old('jenis_kelamin')=='Perempuan') checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat" class="form-label form-regis">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tgl_lahir" class="form-label form-regis">Tanggal Lahir</label>
                                    <input type="date" class="datepicker_input form-control form-control-sm" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                    @error('tgl_lahir')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tempat_lahir" class="form-label form-regis">Tempat Lahir</label>
                                    <input type="text" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir">
                                    @error('tempat_lahir')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 ms-3 me-3">
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="no_hp" class="form-label form-regis">Nomor Handphone</label>
                                    <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" maxlength="13" placeholder="Masukkan No. Hp">
                                    @error('no_hp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label form-regis">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="form-label form-regis">Username</label>
                                    <input type="text" class="form-control form-control-sm" id="username" name="username" onkeyup="checkUsername()" value="{{ old('username') }}" placeholder="Masukkan Username">
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="checkUsername"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label form-regis">Password</label>
                                    <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Masukkan Password">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label form-regis">Confirm Password</label>
                                    <input type="password" class="form-control form-control-sm" id="password" name="re_password" placeholder="Masukkan Re-Password">
                                    @error('re_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center"> <button type="submit" class="btn btn-blue text-center">Daftar / Sign Up</button> </div><br>
                    <div class="row justify-content-center"> Sudah Punya Akun? <a href="{{ route('login') }}" class="btn btn-blue btn-sm text-center ms-2" style="width: 60px;">Login</a> </div>
                </form>
            </div>
        </div>
        <br>
        <div class="bg-blue py-2">
            <div class="row px-3 text-center"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
</div>
<script>
    function checkUsername(){
        var UserName = $(`#username`).val();

        $.ajax({
            type:'get',
            url:'/check_username',
            data: { username : UserName},
            success:function(result) {
                // console.log(data);
                if(result.code === 201){
                    $(`#checkUsername`).html(result.message);
                }else{
                    $(`#checkUsername`).html(result.message);
                }
            }
        });
    }
</script>
@endsection