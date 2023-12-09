@extends('layouts.dashboard-yield')

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
        @if (session()->has('notification'))
        <p id="alert" class="px-6 py-4 text-yellow-700 bg-yellow-200 rounded-lg">{{ session('notification') }}</p>
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
            <div class="grid gap-2 mb-2 lg:flex lg:justify-evenly">
                <a wire:navigate href="/applicant/profile/applicantdata"
                    class="x-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Data
                    Pelamar</a>
                <a wire:navigate href="/applicant/profile/contact"
                    class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Kontak</a>
                <a wire:navigate href="/applicant/profile/educationalbackground"
                    class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Riwayat
                    Pendidikan</a>
                <a wire:navigate href="/applicant/profile/workexperience"
                    class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Pengalaman
                    Kerja</a>
                <a wire:navigate href="/applicant/profile/organizationalexperience"
                    class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Pengalaman
                    Organisasi</a>
                <a wire:navigate href="/applicant/profile/change-password"
                    class="flex justify-start px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Ganti
                    Password</a>
            </div>
            <hr class="my-4 bg-gray-700">
            <button type="button" id="add-button"
                class="px-2 py-1 mb-6 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">+</button>
            @if (!blank(Auth::user()->educationalbackground))
                @foreach (Auth::user()->educationalbackground as $applicant_educationalbackground)
                    <form action="/applicant/profile/educationalbackground/{{ $applicant_educationalbackground->id }}"
                        method="post">
                        @method('put')
                        @csrf
                        <div class="flex flex-col">
                            <div class="flex flex-col justify-between 2xl:flex-row">
                                <div class="mb-4">
                                    <label for="institution"
                                        class="block mb-2 text-sm font-bold text-gray-700">Institusi</label>
                                    <input type="text" name="institution" id="institution" placeholder="Institusi"
                                        value="{{ $applicant_educationalbackground->institution ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('institution') is-invalid @enderror">
                                    @error('institution')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="major" class="block mb-2 text-sm font-bold text-gray-700">Jurusan</label>
                                    <input type="text" name="major" id="major" placeholder="Jurusan"
                                        value="{{ $applicant_educationalbackground->major ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('major') is-invalid @enderror">
                                    @error('major')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Gelar</label>
                                    <input type="text" name="title" id="title" placeholder="Gelar"
                                        value="{{ $applicant_educationalbackground->title ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('title') is-invalid @enderror">
                                    @error('title')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="start_date" class="block mb-2 text-sm font-bold text-gray-700">Mulai
                                        Tanggal</label>
                                    <input type="date" name="start_date" id="start_date"
                                        value="{{ $applicant_educationalbackground->start_date ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('start_date') is-invalid @enderror">
                                    @error('start_date')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="end_date" class="block mb-2 text-sm font-bold text-gray-700">Selesai
                                        Tanggal</label>
                                    <input type="date" name="end_date" id="end_date"
                                        value="{{ $applicant_educationalbackground->end_date ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('end_date') is-invalid @enderror">
                                    @error('end_date')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            {{-- tampilan belum fix --}}
                            <div class="flex gap-3 mb-4">

                                <button type="submit"
                                    class="px-4 py-2 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Perbarui</button>
                    </form>
                    <form action="/applicant/profile/educationalbackground/{{ $applicant_educationalbackground->id }}"
                        method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 font-medium text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                    </form>

        </div>
        @endforeach
    @else
        <form action="/applicant/profile/educationalbackground" method="post">
            @csrf
            <div class="flex flex-col">
                <div class="flex flex-col justify-between 2xl:flex-row">
                    <div class="mb-4">
                        <label for="institution" class="block mb-2 text-sm font-bold text-gray-700">Institusi</label>
                        <input type="text" name="institution" id="institution" placeholder="Institusi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('institution') is-invalid @enderror">
                        @error('institution')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="major" class="block mb-2 text-sm font-bold text-gray-700">Jurusan</label>
                        <input type="text" name="major" id="major" placeholder="Jurusan"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('major') is-invalid @enderror">
                        @error('major')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Gelar</label>
                        <input type="text" name="title" id="title" placeholder="Gelar"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('title') is-invalid @enderror">
                        @error('title')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="start_date" class="block mb-2 text-sm font-bold text-gray-700">Mulai
                            Tanggal</label>
                        <input type="date" name="start_date" id="start_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('start_date') is-invalid @enderror">
                        @error('start_date')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="end_date" class="block mb-2 text-sm font-bold text-gray-700">Selesai
                            Tanggal</label>
                        <input type="date" name="end_date" id="end_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('end_date') is-invalid @enderror">
                        @error('end_date')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-3 mb-4">
                    <button type="submit"
                        class="px-4 py-2 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </div>
        </form>
        @endif
        <form action="/applicant/profile/educationalbackground" method="post" id="dynamic-form" class="hidden">
            @csrf
            <div class="flex flex-col">
                <div class="flex flex-col justify-between 2xl:flex-row">
                    <div class="mb-4">
                        <label for="institution" class="block mb-2 text-sm font-bold text-gray-700">Institusi</label>
                        <input type="text" name="institution" id="institution" placeholder="Institusi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('institution') is-invalid @enderror">
                        @error('institution')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="major" class="block mb-2 text-sm font-bold text-gray-700">Jurusan</label>
                        <input type="text" name="major" id="major" placeholder="Jurusan"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('major') is-invalid @enderror">
                        @error('major')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Gelar</label>
                        <input type="text" name="title" id="title" placeholder="Gelar"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('title') is-invalid @enderror">
                        @error('title')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="start_date" class="block mb-2 text-sm font-bold text-gray-700">Mulai
                            Tanggal</label>
                        <input type="date" name="start_date" id="start_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('start_date') is-invalid @enderror">
                        @error('start_date')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="end_date" class="block mb-2 text-sm font-bold text-gray-700">Selesai
                            Tanggal</label>
                        <input type="date" name="end_date" id="end_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('end_date') is-invalid @enderror">
                        @error('end_date')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-3 mb-4">
                    <button type="submit"
                        class="px-4 py-2 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <script>
        const addButton = document.getElementById('add-button');
        const formContainer = document.getElementById('dynamic-form');

        addButton.addEventListener('click', () => {
            const clone = formContainer.cloneNode(true);
            // Reset input values in the cloned form
            const inputs = clone.querySelectorAll('input');
            inputs.forEach(input => {
                input.value = '';
            });

            if (formContainer.classList.contains('hidden')) {
                formContainer.classList.remove('hidden');

            } else {
                formContainer.classList.add('hidden');
            }

            // Append the cloned form to the container
            formContainer.parentNode.appendChild(clone);
        });
    </script>

@endsection
