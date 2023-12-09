@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col items-center justify-center w-full">
        @if (session()->has('success'))
<p id="alert" class="px-6 py-4 rounded-lg text-success-700 bg-success-200">{{ session('success') }}</p>
<script>
    // Menghilangkan alert setelah 3 detik
    setTimeout(function() {
        var alert = document.getElementById('alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000);
</script>
@endif
        @if (session()->has('error'))
            <p id="alert" class="px-6 py-4 rounded-lg text-danger-700 bg-danger-200">{{ session('error') }}</p>
            <script>
                // Menghilangkan alert setelah 3 detik
                setTimeout(function() {
                    var alert = document.getElementById('alert');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000);
            </script>
        @endif
        <div class="w-11/12 p-8 bg-white rounded-lg shadow-md md:w-3/4">
            <div class="relative grid gap-2 mb-2 lg:flex lg:justify-evenly">
                <a href="/applicant/applicantdata"
                    class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md tab focus:outline-none focus:bg-blue-500 focus:text-white focus:border-none">Data
                    Pelamar</a>
                <a href="/applicant/contact"
                    class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md tab focus:outline-none focus:bg-blue-500 focus:text-white focus:border-none">Kontak</a>
                <a href="/applicant/workexperience"
                    class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md tab focus:outline-none focus:bg-blue-500 focus:text-white focus:border-none">Pengalaman
                    Kerja</a>
                <a href="/applicant/educationalbackground"
                    class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md tab focus:outline-none focus:bg-blue-500 focus:text-white focus:border-none">Riwayat
                    Pendidikan</a>
                <a href="/applicant/organizationalexperience"
                    class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md tab focus:outline-none focus:bg-blue-500 focus:text-white focus:border-none">Pengalaman
                    Organisasi</a>
                    <a href="/applicant/change-password"
                    class="px-4 py-2 text-xs font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">Ubah
                    Password</a>
            </div>
            <hr class="my-4 bg-gray-700">
            <form action="/applicant/change-password" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="current_password" class="block mb-2 text-sm font-bold text-gray-700">Kata Sandi Sekarang</label>
                    <input type="password" id="current_password" name="current_password" placeholder="Kata Sandi Sekarang"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('current_password') is-invalid @enderror">
                    @error('current_password')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Kata Sandi Baru</label>
                    <input type="password" id="password" name="password" placeholder="Kata sandi Baru"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror">
                    @error('password')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block mb-2 text-sm font-bold text-gray-700">Konfirmasi Kata
                        Sandi Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Kata Sandi Baru"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex w-full justify-evenly ">
                    <button type="submit"
                        class="px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-200">
                        Reset
                    </button>
                    <button type="submit"
                        class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection