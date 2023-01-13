@extends('layouts.app')

@section('container')
<h2>Hi, {{ Auth::user()->fullname }}</h2>
<h3>Selamat Datang, {{ auth()->user()->fullname }}</h3>
@endsection