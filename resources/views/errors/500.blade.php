@extends('layouts.errors')

@section('title')
    500 Internal Server Error
@endsection
@section('code')
    429
@endsection
@section('message-header')
    Maaf, terjadi kesalahan internal pada server kami
@endsection
@section('message-body')
    Tim teknis kami sedang bekerja untuk memperbaikinya. Silakan coba kembali dalam beberapa saat. Jika masalah berlanjut, jangan ragu untuk menghubungi tim dukungan kami. Terima kasih atas kesabaran dan pengertian Anda.
@endsection
