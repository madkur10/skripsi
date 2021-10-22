@extends('layouts.mains')

@section('container')
<h2>Hi, {{ session('user') }}</h2>
@endsection