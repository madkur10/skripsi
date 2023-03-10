@extends('layouts.plain')

@section('container')
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="row col-12"> <img src="img/header.png"> </div>
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/carousel_1.jpg" class="d-block w-100 carouselsize" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/carousel_2.jpg" class="d-block w-100 carouselsize" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/carousel_3.jpg" class="d-block w-100 carouselsize" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-2 px-3">
                        <h5>Login Telemedicine - Rs Pelni</h5>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>

                    @if (session('invalid'))
                    <div class="alert alert-danger">
                        {{ session('invalid') }}
                    </div>
                    @endif
                    @if (session('berhasil'))
                    <div class="alert alert-success">
                        {{ session('berhasil') }}
                    </div>
                    @endif
                    <form action="{{ route('login.action') }}" method="POST">
                        @csrf
                        <div class="row px-3 mb-4"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">User Name</h6>
                            </label> <input type="text" name="username" placeholder="Enter a valid user name"> 
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row px-3 mb-5"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                            </label> <input type="password" name="password" placeholder="Enter password"> 
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                        <div class="row mb-4 px-3"> <small class="font-weight-bold">Tidak mempunyai akun? <a href="{{ route('registrasi') }}" class="text-danger ">Register</a></small> </div>
                    </form>
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