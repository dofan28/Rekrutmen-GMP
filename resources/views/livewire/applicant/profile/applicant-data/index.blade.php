<div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Data Pribadi</h2>
                </li>
                <li>
                    <div class="flex items-center w-full">
                        <div>
                            <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M12 6.43994V9.76994" stroke="#292D32" stroke-width="0.9120000000000001"
                                        stroke-miterlimit="10" stroke-linecap="round"></path>
                                    <path
                                        d="M12.02 2C8.34002 2 5.36002 4.98 5.36002 8.66V10.76C5.36002 11.44 5.08002 12.46 4.73002 13.04L3.46002 15.16C2.68002 16.47 3.22002 17.93 4.66002 18.41C9.44002 20 14.61 20 19.39 18.41C20.74 17.96 21.32 16.38 20.59 15.16L19.32 13.04C18.97 12.46 18.69 11.43 18.69 10.76V8.66C18.68 5 15.68 2 12.02 2Z"
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10"
                                        stroke-linecap="round"></path>
                                    <path
                                        d="M15.33 18.8201C15.33 20.6501 13.83 22.1501 12 22.1501C11.09 22.1501 10.25 21.7701 9.65004 21.1701C9.05004 20.5701 8.67004 19.7301 8.67004 18.8201"
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="flex items-center px-3 py-1 shadow-sm rounded-2xl bg-gray-50">
                            <div class="flex flex-col h-full mr-2">
                                <h6 class="text-sm font-semibold">
                                    {{ Auth::user()->username }}</h6>
                                <span class="text-xs">Pelamar</span>
                            </div>
                            @if (Auth::user()->applicantdata->photo ?? '')
                                <img class="rounded-full"
                                    src="{{ asset('storage/' . Auth::user()->applicantdata->photo) }}"
                                    width="35px" srcset="">
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
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
        <form wire:submit='save'>
            <div class="flex flex-col">
                @if (Auth::user()->applicantdata->photo ?? '')
                    <div class="flex items-center justify-center w-full h-full overflow-hidden rounded">
                        <img src="{{ asset('storage/' . Auth::user()->applicantdata->photo) }}"
                            alt="photo" class="object-cover w-48 h-48" />
                    </div>
                @endif
                <div>
                    <label for="photo" class="block mb-2 text-sm font-bold text-gray-700">Unggah Foto
                        Profil</label>
                    <input wire:model='photo' type="file" id="photo" accept="image/*"
                        class="photo-preview appearance-noneshadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline focus:outline-1 focus:shadow-outline mb-2 @error('photo') is-invalid @enderror"
                        placeholder="Pilih foto..." onchange="previewPhoto()">
                    @error('photo')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="ktp_number">
                    Nomor KTP
                </label>
                <input wire:model='ktp_number'
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('ktp_number') is-invalid @enderror"id="ktp_number"
                    type="text" placeholder="Nomor KTP">
                @error('ktp_number')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="full_name">
                    Nama Lengkap
                </label>
                <input wire:model='full_name'
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('full_name') is-invalid @enderror"
                    id="full_name" type="text" placeholder="Nama Lengkap">
                @error('full_name')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="place_of_birth">
                    Tempat Lahir
                </label>
                <input wire:model='place_of_birth'
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('place_of_birth') is-invalid @enderror"
                    id="place_of_birth" type="text" placeholder="Tempat Lahir">
                @error('place_of_birth')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="date_of_birth">
                    Tanggal Lahir
                </label>
                <input wire:model='date_of_birth'
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('date_of_birth') is-invalid @enderror"
                    id="date_of_birth" type="date">
                @error('date_of_birth')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="gender">
                    Jenis Kelamin
                </label>
                <div class="relative">
                    <select wire:model='gender'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('gender') is-invalid @enderror"
                        id="gender">

                        <option value="" @if (is_null(Auth::user()->applicantdata) ||
                                is_null(Auth::user()->applicantdata->gender)) selected @endif>Pilih Jenis Kelamin
                        </option>
                        <option value="Pria" @if (
                            !is_null(Auth::user()->applicantdata) &&
                                Auth::user()->applicantdata->gender === 'Pria') selected @endif>Pria</option>
                        <option value="Wanita" @if (
                            !is_null(Auth::user()->applicantdata) &&
                                Auth::user()->applicantdata->gender === 'Wanita') selected @endif>Wanita</option>
                    </select>

                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10.2929 12.7071C10.6834 13.0976 11.3166 13.0976 11.7071 12.7071L16.7071 7.70711C17.0976 7.31658 17.0976 6.68342 16.7071 6.29289C16.3166 5.90237 15.6834 5.90237 15.2929 6.29289L10 11.5858L4.70711 6.29289C4.31658 5.90237 3.68342 5.90237 3.29289 6.29289C2.90237 6.68342 2.90237 7.31658 3.29289 7.70711L8.29289 12.7071C8.68342 13.0976 9.31658 13.0976 9.70711 12.7071C9.89464 12.5196 10 12.2652 10 12C10 11.7348 9.89464 11.4804 9.70711 11.2929L10.2929 12.7071Z" />
                        </svg>
                    </div>
                    @error('gender')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
                </div>
            </div>
            <div class="relative mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="marital_status">
                    Status Perkawinan
                </label>
                <div class="relative">
                    <select wire:model='marital_status'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('martial_status') is-invalid @enderror"
                        id="marital_status">

                        <option value="" @if (is_null(Auth::user()->applicantdata) ||
                                Auth::user()->applicantdata->marital_status) selected @endif>Pilih Status
                            Perkawinan</option>
                        <option value="Belum Kawin" @if (
                            !is_null(Auth::user()->applicantdata) &&
                                Auth::user()->applicantdata->marital_status === 'Belum Kawin') selected @endif>Belum Kawin
                        </option>
                        <option value="Kawin" @if (
                            !is_null(Auth::user()->applicantdata) &&
                                Auth::user()->applicantdata->marital_status === 'Kawin') selected @endif>Kawin</option>
                        <option value="Cerai Hidup" @if (
                            !is_null(Auth::user()->applicantdata) &&
                                Auth::user()->applicantdata->marital_status === 'Cerai Hidup') selected @endif>Cerai Hidup
                        </option>
                        <option value="Cerai Mati" @if (
                            !is_null(Auth::user()->applicantdata) &&
                                Auth::user()->applicantdata->marital_status === 'Cerai Mati') selected @endif>Cerai Mati
                        </option>
                    </select>

                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10.2929 12.7071C10.6834 13.0976 11.3166 13.0976 11.7071 12.7071L16.7071 7.70711C17.0976 7.31658 17.0976 6.68342 16.7071 6.29289C16.3166 5.90237 15.6834 5.90237 15.2929 6.29289L10 11.5858L4.70711 6.29289C4.31658 5.90237 3.68342 5.90237 3.29289 6.29289C2.90237 6.68342 2.90237 7.31658 3.29289 7.70711L8.29289 12.7071C8.68342 13.0976 9.31658 13.0976 9.70711 12.7071C9.89464 12.5196 10 12.2652 10 12C10 11.7348 9.89464 11.4804 9.70711 11.2929L10.2929 12.7071Z" />
                        </svg>
                    </div>
                    @error('marital_status')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
                </div>
            </div>
            <div class="flex w-full justify-evenly ">
                <button type="submit"
                    class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">
                    @if (isset(Auth::user()->applicantdata))
                        Simpan Perubahan
                    @else
                        Simpan
                    @endif
                </button>

            </div>
        </form>
    </div>
</div>
</div>
