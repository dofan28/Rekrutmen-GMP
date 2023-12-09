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

            {{-- <div class="py-6">
                <label for="workexperience" class="text-lg font-semibold">Apakah Anda memiliki pengalaman kerja?</label>
                <div class="flex items-center mt-2">
                    <input type="radio" id="yes" name="workexperience" value="yes" class="mr-2">
                    <label for="yes" class="mr-4">Ya</label>
                    <input type="radio" id="no" name="workexperience" value="no" class="mr-2">
                    <label for="no">No</label>
                </div>
            </div> --}}
            <button type="button" id="add-button"
                class="px-2 py-1 mb-6 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">+</button>
            @if (!blank(Auth::user()->workexperience))
                @foreach (Auth::user()->workexperience as $applicant_workexperience)
                    <form action="/applicant/profile/workexperience/{{ $applicant_workexperience->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="flex flex-col">
                            <div class="flex flex-col justify-between 2xl:flex-row">
                                <div class="mb-4">
                                    <label for="company"
                                        class="block mb-2 text-sm font-bold text-gray-700">Perusahaan</label>
                                    <input type="text" name="company" id="company" placeholder="Perusahaan"
                                        value="{{ $applicant_workexperience->company ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('company') is-invalid @enderror">
                                    @error('company')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="position" class="block mb-2 text-sm font-bold text-gray-700">Posisi</label>
                                    <input type="text" name="position" id="position" placeholder="Posisi"
                                        value="{{ $applicant_workexperience->position ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('position') is-invalid @enderror">
                                    @error('position')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="last_salary" class="block mb-2 text-sm font-bold text-gray-700">Gaji
                                        Terakhir</label>
                                    <input type="text" name="last_salary" id="last_salary" placeholder="Gaji Terakhir"
                                        value="{{ $applicant_workexperience->last_salary ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('last_salary') is-invalid @enderror">
                                    @error('last_salary')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="start_date" class="block mb-2 text-sm font-bold text-gray-700">Mulai
                                        Tanggal</label>
                                    <input type="date" name="start_date" id="start_date"
                                        value="{{ $applicant_workexperience->start_date ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('start_date') is-invalid @enderror">
                                    @error('start_date')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="end_date" class="block mb-2 text-sm font-bold text-gray-700">Selesai
                                        Tanggal</label>
                                    <input type="date" name="end_date" id="end_date"
                                        value="{{ $applicant_workexperience->end_date ?? '' }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('end_date') is-invalid @enderror">
                                    @error('end_date')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="job_description_{{ $applicant_workexperience->id }}"
                                    class="block mb-2 text-sm font-bold text-gray-700">Deskripsi
                                    Pekerjaan</label>
                                <input type="hidden" name="job_description"
                                    id="job_description_{{ $applicant_workexperience->id }}"
                                    value="{{ $applicant_workexperience->job_description ?? '' }}"
                                    class="@error('job_description') is-invalid @enderror">
                                <trix-editor input="job_description_{{ $applicant_workexperience->id }}"></trix-editor>
                            </div>
                            {{-- tampilan belum fix --}}
                            <div class="flex gap-3 mb-4">
                                <button type="submit"
                                    class="px-4 py-2 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Perbarui</button>
                    </form>
                    <form action="/applicant/profile/workexperience/{{ $applicant_workexperience->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 font-medium text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                    </form>
        </div>
        @endforeach
    @else
        <form action="/applicant/profile/workexperience" method="post">
            @csrf
            <div class="flex flex-col">
                <div class="flex flex-col justify-between 2xl:flex-row">
                    <div class="mb-4">
                        <label for="company" class="block mb-2 text-sm font-bold text-gray-700">Perusahaan</label>
                        <input type="text" name="company" id="company" placeholder="Perusahaan"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('company') is-invalid @enderror">
                        @error('company')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="position" class="block mb-2 text-sm font-bold text-gray-700">Posisi</label>
                        <input type="text" name="position" id="position" placeholder="Posisi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('position') is-invalid @enderror">
                        @error('position')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="last_salary" class="block mb-2 text-sm font-bold text-gray-700">Gaji
                            Terakhir</label>
                        <input type="text" name="last_salary" id="last_salary" placeholder="Gaji Terakhir"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('last_salary') is-invalid @enderror">
                        @error('last_salary')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="start_date" class="block mb-2 text-sm font-bold text-gray-700">Mulai
                            Tanggal</label>
                        <input type="date" name="start_date" id="start_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('start_date') is-invalid @enderror">
                        @error('start_date')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="end_date" class="block mb-2 text-sm font-bold text-gray-700">Selesai
                            Tanggal</label>
                        <input type="date" name="end_date" id="end_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('end_date') is-invalid @enderror">
                        @error('end_date')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="job_description" class="block mb-2 text-sm font-bold text-gray-700">Deskripsi
                        Pekerjaan</label>
                    <input type="hidden" name="job_description" id="job_description"
                        class="@error('position') is-invalid @enderror">
                    <trix-editor input="job_description"></trix-editor>
                    @error('job_description')
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
        <form action="/applicant/profile/workexperience" method="post" id="dynamic-form" class="hidden">
            @csrf
            <div class="flex flex-col">
                <div class="flex flex-col justify-between 2xl:flex-row">
                    <div class="mb-4">
                        <label for="company" class="block mb-2 text-sm font-bold text-gray-700">Perusahaan</label>
                        <input type="text" name="company" id="company" placeholder="Perusahaan"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('company') is-invalid @enderror">
                        @error('company')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="position" class="block mb-2 text-sm font-bold text-gray-700">Posisi</label>
                        <input type="text" name="position" id="position" placeholder="Posisi"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('position') is-invalid @enderror">
                        @error('position')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="last_salary" class="block mb-2 text-sm font-bold text-gray-700">Gaji
                            Terakhir</label>
                        <input type="text" name="last_salary" id="last_salary" placeholder="Gaji Terakhir"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('last_salary') is-invalid @enderror">
                        @error('last_salary')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="start_date" class="block mb-2 text-sm font-bold text-gray-700">Mulai
                            Tanggal</label>
                        <input type="date" name="start_date" id="start_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('start_date') is-invalid @enderror">
                        @error('start_date')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="end_date" class="block mb-2 text-sm font-bold text-gray-700">Selesai
                            Tanggal</label>
                        <input type="date" name="end_date" id="end_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('end_date') is-invalid @enderror">
                        @error('end_date')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="job_description" class="block mb-2 text-sm font-bold text-gray-700">Deskripsi
                        Pekerjaan</label>
                    <input type="hidden" name="job_description" id="job_description2"
                        class="@error('job_description') is-invalid @enderror">
                    <trix-editor input="job_description2"></trix-editor>
                    @error('job_description')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 mb-4">
                    <button type="submit"
                        class="px-4 py-2 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                    {{-- <button type="button" class="px-4 py-2 font-medium text-white bg-red-500 rounded delete-btn hover:bg-red-700">Hapus</button> --}}
                </div>

            </div>
        </form>

        <script>
            const addButton = document.getElementById('add-button');
            const formContainer = document.getElementById('dynamic-form');
            // const deleteButtons = document.querySelectorAll('.delete-btn');


            addButton.addEventListener('click', () => {
                const clone = formContainer.cloneNode(true);
                const deleteButton = clone.querySelector('.delete-btn');

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

                // // Add a new delete button event listener
                // deleteButton.addEventListener('click', () => {
                //     clone.remove();
                // });

                // Append the cloned form to the container
                formContainer.parentNode.appendChild(clone);
            });

            // // Add event listeners to delete buttons in existing forms
            // deleteButtons.forEach(deleteButton => {
            //     deleteButton.addEventListener('click', () => {
            //         formContainer.remove();
            //     });
            // });

            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            })
        </script>
    </div>
    </div>



@endsection
