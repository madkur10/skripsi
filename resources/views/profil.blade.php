@extends('layouts.main')

@section('container')
<h1>Halaman Profil</h1>
<h3>{{ $name }}</h3>
<h4>{{ $nim }}</h4>
<img src="img/{{ $image }}" alt="madkur_image" class="profil_image">
@endsection