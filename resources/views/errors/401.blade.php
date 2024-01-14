@extends('layouts.errors')

@section('title')
    401 Unauthorized
@endsection
@section('code')
    401
@endsection
@section('message-header')
Maaf, akses ditolak.
@endsection
@section('message-body')
Anda tidak memiliki izin untuk mengakses halaman ini. Mohon pastikan Anda telah login dengan akun yang sesuai atau hubungi administrator untuk bantuan lebih lanjut.
@endsection
