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
            @if (!blank(Auth::user()->organizationalexperience))
                @foreach (Auth::user()->organizationalexperience as $applicant_organizationalexperience)
                    <form action="/applicant/profile/organizationalexperience/{{ $applicant_organizationalexperience->id }}"
                        method="post">
                        @method('put')
                        @csrf
                        <div class="flex flex-col">
                            <div class="flex flex-col justify-start xl:flex-row xl:gap-4">
                                <div class="mb-4">
                                    <label for="organizational_name" class="block mb-2 text-sm font-bold text-gray-700">Nama
                                        Organisasi</label>
                                    <input type="text" name="organizational_name" id="organizational_name"
                                        placeholder="Nama Organisasi"
                                        value="{{ $applicant_organizationalexperience->organizational_name ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('organizational_name') is-invalid @enderror">
                                    @error('organizational_name')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="position" class="block mb-2 text-sm font-bold text-gray-700">Posisi</label>
                                    <input type="text" name="position" id="position" placeholder="Posisi"
                                        value="{{ $applicant_organizationalexperience->position ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('position') is-invalid @enderror">
                                    @error('position')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="organizational_description_{{ $applicant_organizationalexperience->id }}"
                                    class="block mb-2 text-sm font-bold text-gray-700">Deskripsi
                                    Organisasi</label>
                                <input type="hidden" name="organizational_description"
                                    id="organizational_description_{{ $applicant_organizationalexperience->id }}"
                                    value="{{ $applicant_organizationalexperience->organizational_description ?? '' }}"
                                    class="@error('organizational_description') is-invalid @enderror">
                                <trix-editor
                                    input="organizational_description_{{ $applicant_organizationalexperience->id }}"></trix-editor>
                                @error('organizational_description')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- tampilan belum fix --}}
                            <div class="flex gap-3 mb-4">

                                <button type="submit"
                                    class="px-4 py-2 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Perbarui</button>

                    </form>
                    <form action="/applicant/profile/organizationalexperience/{{ $applicant_organizationalexperience->id }}"
                        method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 font-medium text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                    </form>
        </div>
        @endforeach
    @else
        <form action="/applicant/profile/organizationalexperience" method="post">
            @csrf
            <div class="flex flex-col">
                <div class="flex flex-col justify-start xl:flex-row xl:gap-4">
                    <div class="mb-4">
                        <label for="organizational_name" class="block mb-2 text-sm font-bold text-gray-700">Nama
                            Organisasi</label>
                        <input type="text" name="organizational_name" id="organizational_name"
                            placeholder="Nama Organisasi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('organizational_name') is-invalid @enderror">
                        @error('organizational_name')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="position" class="block mb-2 text-sm font-bold text-gray-700">Posisi</label>
                        <input type="text" name="position" id="position" placeholder="Posisi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('position') is-invalid @enderror">
                        @error('position')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="organizational_description" class="block mb-2 text-sm font-bold text-gray-700">Deskripsi
                        Organisasi</label>
                    <input type="hidden" name="organizational_description" id="organizational_description2"
                        class="@error('organizational_description') is-invalid @enderror">
                    <trix-editor input="organizational_description2"></trix-editor>
                    @error('organizational_description')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-3 mb-4">
                    <button type="submit"
                        class="px-4 py-2 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </div>
        </form>
        @endif
        <form action="/applicant/profile/organizationalexperience" method="post" id="dynamic-form" class="hidden">
            @csrf
            <div class="flex flex-col">
                <div class="flex flex-col justify-start xl:flex-row xl:gap-4">
                    <div class="mb-4">
                        <label for="organizational_name" class="block mb-2 text-sm font-bold text-gray-700">Nama
                            Organisasi</label>
                        <input type="text" name="organizational_name" id="organizational_name"
                            placeholder="Nama Organisasi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('organizational_name') is-invalid @enderror">
                        @error('organizational_name')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="position" class="block mb-2 text-sm font-bold text-gray-700">Posisi</label>
                        <input type="text" name="position" id="position" placeholder="Posisi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('position') is-invalid @enderror">
                        @error('position')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="organizational_description" class="block mb-2 text-sm font-bold text-gray-700">Deskripsi
                        Organisasi</label>
                    <input type="hidden" name="organizational_description" id="organizational_description"
                        class="@error('organizational_description') is-invalid @enderror">
                    <trix-editor input="organizational_description"></trix-editor>
                    @error('organizational_description')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
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
