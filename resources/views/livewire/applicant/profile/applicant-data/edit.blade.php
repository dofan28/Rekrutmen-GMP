<div class=" px-9">
    {{-- <header>
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
    <div class="w-11/12 p-8  rounded-lg shadow-md md:w-3/4">
        <div class="grid gap-2 mb-2 lg:flex lg:justify-evenly">
            <a wire:navigate href="/applicant/profile/applicantdata"
            class="x-4 py-2 text-xs font-semibold text-black  border-2 border-black rounded-md focus:outline-none ">Data
            Pelamar</a>
        <a wire:navigate href="/applicant/profile/contact"
            class="px-4 py-2 text-xs font-semibold text-black  border-2 border-black rounded-md focus:outline-none ">Kontak</a>
        <a wire:navigate href="/applicant/profile/educationalbackground"
            class="px-4 py-2 text-xs font-semibold text-black  border-2 border-black rounded-md focus:outline-none ">Riwayat
            Pendidikan</a>
        <a wire:navigate href="/applicant/profile/workexperience"
            class="px-4 py-2 text-xs font-semibold text-black  border-2 border-black rounded-md focus:outline-none ">Pengalaman
            Kerja</a>
        <a wire:navigate href="/applicant/profile/organizationalexperience"
            class="px-4 py-2 text-xs font-semibold text-black  border-2 border-black rounded-md focus:outline-none ">Pengalaman
            Organisasi</a>
        <a wire:navigate href="/applicant/profile/change-password"
            class="flex justify-start px-4 py-2 text-xs font-semibold text-black  border-2 border-black rounded-md focus:outline-none ">Ganti
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

                        <option value="" @if (is_null(Auth::user()->applicantdata) || is_null(Auth::user()->applicantdata->gender)) selected @endif>Pilih Jenis Kelamin
                        </option>
                        <option value="Pria" @if (!is_null(Auth::user()->applicantdata) && Auth::user()->applicantdata->gender === 'Pria') selected @endif>Pria</option>
                        <option value="Wanita" @if (!is_null(Auth::user()->applicantdata) && Auth::user()->applicantdata->gender === 'Wanita') selected @endif>Wanita</option>
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

                        <option value="" @if (is_null(Auth::user()->applicantdata) || Auth::user()->applicantdata->marital_status) selected @endif>Pilih Status
                            Perkawinan</option>
                        <option value="Belum Kawin" @if (!is_null(Auth::user()->applicantdata) && Auth::user()->applicantdata->marital_status === 'Belum Kawin') selected @endif>Belum Kawin
                        </option>
                        <option value="Kawin" @if (!is_null(Auth::user()->applicantdata) && Auth::user()->applicantdata->marital_status === 'Kawin') selected @endif>Kawin</option>
                        <option value="Cerai Hidup" @if (!is_null(Auth::user()->applicantdata) && Auth::user()->applicantdata->marital_status === 'Cerai Hidup') selected @endif>Cerai Hidup
                        </option>
                        <option value="Cerai Mati" @if (!is_null(Auth::user()->applicantdata) && Auth::user()->applicantdata->marital_status === 'Cerai Mati') selected @endif>Cerai Mati
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
                    class="px-4 py-2 font-semibold font-poppins text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">
                    @if (isset(Auth::user()->applicantdata))
                        Simpan Perubahan
                    @else
                        Simpan
                    @endif
                </button>

            </div>
        </form>
    </div>
</div> --}}
    <!-- section header -->
    <div class="text-start mt-14">
        <h2 class="text-3xl tracking-wide font-bold text-gray-800 sm:text-4xl">Profil Saya</h2>
    </div>

    <!-- section content -->
    <div class="flex justify-start items-center mt-4 p-8 h-40 w-full overflow-hidden bg-gray-50">
        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
            class="h-28 w-h-28 object-cover">
        <div class="flex flex-col w-full h-full pl-5">
            <h1 class="text-2xl font-medium text-gray-800 font-montserrat">{{ auth()->user()->username }}</h1>
            <p class="text-sm text-gray-800 font-light font-poppins">{{ auth()->user()->email }}</p>
        </div>
    </div>
    <div class="grid grid-cols-12">

        <div
            class="col-span-12 w-full pr-3 py-6 justify-center flex flex-wrap space-x-4 space-y-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start">

            <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                href="#"
                class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/applicantdata*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                        :fill="isHovered ? '#f9fafb' : ({{ json_encode(request()->is('applicant/profile/applicantdata*')) }} ?
                            '#f9fafb' : '#1e40a')">
                        <path
                            d="M480-240q-56 0-107 17.5T280-170v10h400v-10q-42-35-93-52.5T480-240Zm0-80q69 0 129 21t111 59v-560H240v560q51-38 111-59t129-21Zm0-160q-25 0-42.5-17.5T420-540q0-25 17.5-42.5T480-600q25 0 42.5 17.5T540-540q0 25-17.5 42.5T480-480ZM160-80v-800h640v800H160Zm320-320q58 0 99-41t41-99q0-58-41-99t-99-41q-58 0-99 41t-41 99q0 58 41 99t99 41Zm0-140Z" />
                    </svg>
                </div>

                <span class="ml-2 font-medium font-montserrat">Data Pribadi</span>
            </a>

            <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                href="#"
                class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/contact*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                        :fill="isHovered ? '#f9fafb' : ({{ json_encode(request()->is('applicant/profile/contact*')) }} ?
                            '#f9fafb' : '#1e40a')">
                        <path
                            d="M160-40v-80h640v80H160Zm0-800v-80h640v80H160Zm320 400q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM80-160v-640h800v640H80Zm150-80q45-56 109-88t141-32q77 0 141 32t109 88h70v-480H160v480h70Zm118 0h264q-29-20-62.5-30T480-280q-36 0-69.5 10T348-240Zm132-280q-17 0-28.5-11.5T440-560q0-17 11.5-28.5T480-600q17 0 28.5 11.5T520-560q0 17-11.5 28.5T480-520Zm0 40Z" />
                    </svg>
                </div>

                <span class="ml-2 font-medium font-montserrat">Kontak</span>
            </a>

            <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                href="#"
                class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/educationalbackground*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
                <div>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                        :fill="isHovered ? '#f9fafb' : (
                            {{ json_encode(request()->is('applicant/profile/educationalbackground*')) }} ?
                            '#f9fafb' : '#1e40a')">
                        <path
                            d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z" />
                    </svg>
                </div>

                <span class="ml-2 font-medium font-montserrat">Riwayat Pendidikan</span>
            </a>

            <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                href="#"
                class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/workexperience*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                        :fill="isHovered ? '#f9fafb' : ({{ json_encode(request()->is('applicant/profile/workexperience*')) }} ?
                            '#f9fafb' : '#1e40a')">
                        <path
                            d="M80-120v-600h240v-160h320v160h240v600H80Zm80-80h640v-440H160v440Zm240-520h160v-80H400v80ZM160-200v-440 440Z" />
                    </svg>
                </div>

                <span class="ml-2 font-medium font-montserrat">Pengalaman Kerja</span>
            </a>

            <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                href="#"
                class="flex items-center bg-blue text-sm p-2 hover:bg-blue-800 hover:text-gray-100 {{ request()->is('applicant/profile/organizationalexperience*') ? 'bg-blue-800 text-gray-100' : 'bg-gray-100' }}">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                        :fill="isHovered ? '#f9fafb' : (
                            {{ json_encode(request()->is('applicant/profile/organizationalexperience*')) }} ?
                            '#f9fafb' : '#1e40a')">
                        <path
                            d="M40-160v-160q0-34 23.5-57t56.5-23h131q20 0 38 10t29 27q29 39 71.5 61t90.5 22q49 0 91.5-22t70.5-61q13-17 30.5-27t36.5-10h131q34 0 57 23t23 57v160H640v-91q-35 25-75.5 38T480-200q-43 0-84-13.5T320-252v92H40Zm440-160q-38 0-72-17.5T351-386q-17-25-42.5-39.5T253-440q22-37 93-58.5T480-520q63 0 134 21.5t93 58.5q-29 0-55 14.5T609-386q-22 32-56 49t-73 17ZM160-440q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T280-560q0 50-34.5 85T160-440Zm640 0q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T920-560q0 50-34.5 85T800-440ZM480-560q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-680q0 50-34.5 85T480-560Z" />
                    </svg>
                </div>

                <span class="ml-2 font-medium font-montserrat">Pengalaman Organisasi</span>
            </a>

            <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                href="#" class="flex items-center text-sm p-2 bg-gray-100 hover:bg-blue-800 hover:text-gray-100">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-6 w-6"
                        :fill="isHovered ? '#f9fafb' : '#1f2937'">
                        <path
                            d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
                    </svg>
                </div>

                <span class="ml-2 font-medium font-montserrat">Pengaturan Keamanan</span>
            </a>


        </div>

        <div
            class="col-span-12 md:border-solid md:border-l md:border-gray-800 md:border-opacity-25 h-full pb-12 md:col-span-10">
            <div class="py-4 md:pl-4">
                <div class="flex flex-col space-y-4 bg-gray-50 p-4">
                    <a wire:navigate href="/applicant/"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                            width="24">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                        </svg></a>
                    <div class="mb-3">
                        <div class="flex w-full justify-between">
                            <h3 class="text-2xl font-semibold text-gray-800 tracking-wide font-montserrat">Edit Data
                                Pribadi
                            </h3>
                        </div>
                        <hr class="mt-2">
                    </div>
                    <form wire:submit='update'>
                        <div class="mb-2">
                            <label for="nik" class="block mb-1 text-gray-800 font-semibold font-poppins">NIK <span
                                    class="text-red-600 font-semibold">*</span></label>
                            <input wire:model='ktp_number' type="text" id="nik" name="ktp_number"
                                placeholder="contoh: 1234567890123456"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 @error('ktp_number') border-red-500 @enderror"
                                required>
                            @error('ktp_number')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins">Nama Lengkap (Sesuai
                                KTP) <span class="text-red-600 font-semibold">*</span></label>
                            <input wire:model='full_name' type="text" name="full_name"
                                placeholder="contoh: Budi Saputra"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('full_name') border-red-500 @enderror border-gray-800"
                                required>
                            @error('full_name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4 mb-2">
                            <div class="w-full">
                                <label class="block mb-1 text-gray-800 font-semibold font-poppins">Tempat
                                    Lahir <span class="text-red-600 font-semibold">*</span></label>
                                <input wire:model='place_of_birth' type="text" name="place_of_birth"
                                    placeholder="contoh: Mojokerto"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('place_of_birth') border-red-500 @enderror border-gray-800"
                                    required>
                                @error('place_of_birth')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label class="block mb-1 text-gray-800 font-semibold font-poppins">Tanggal
                                    Lahir <span class="text-red-600 font-semibold">*</span></label>
                                <input wire:model='date_of_birth' type="date" name="date_of_birth"
                                    placeholder="contoh: 01/30/2002"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins  @error('date_of_birth') border-red-500 @enderror  border-gray-800"
                                    required>
                                @error('date_of_birth')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins">Jenis
                                Kelamin <span class="text-red-600 font-semibold">*</span></label>
                            <div class="text-gray-800 font-poppins">
                                <input wire:model='gender' type="radio" id="pria" name="gender"
                                    value="Pria" class="mr-2" @if ($applicantdata->gender == 'Pria') checked @endif>
                                <label for="pria">Pria</label>
                            </div>

                            <div class="text-gray-800 font-poppins">
                                <input wire:model='gender' type="radio" id="Wanita" name="gender"
                                    value="Wanita" class="mr-2" @if ($applicantdata->gender == 'Wanita') checked @endif>
                                <label for="Wanita">Wanita</label>
                            </div>
                            @error('gender')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins">Status
                                Perkawinan <span class="text-red-600 font-semibold">*</span></label>
                            <div class="text-gray-800 font-poppins">
                                <input wire:model='marital_status' type="radio" id="belumkawin"
                                    name="marital_status" value="Belum Kawin" class="mr-2"
                                    @if ($applicantdata->marital_status == 'Belum Kawin') checked @endif>
                                <label for="belumkawin">Belum Kawin</label>
                            </div>
                            <div class="text-gray-800 font-poppins">
                                <input wire:model='marital_status' type="radio" id="kawin"
                                    name="marital_status" value="Kawin" class="mr-2"
                                    @if ($applicantdata->marital_status == 'Kawin') checked @endif>
                                <label for="kawin">Kawin</label>
                            </div>
                            <div class="text-gray-800 font-poppins">
                                <input wire:model='marital_status' type="radio" id="cerai"
                                    name="marital_status" value="Cerai Hidup"
                                    class="mr-2"@if ($applicantdata->marital_status == 'Cerai Hidup') checked @endif>
                                <label for="cerai">Cerai Hidup</label>
                            </div>
                            <div class="text-gray-800 font-poppins">
                                <input wire:model='marital_status' type="radio" id="ceraimati"
                                    name="marital_status" value="Cerai Mati" class="mr-2"
                                    @if ($applicantdata->marital_status == 'Cerai Mati') checked @endif>
                                <label for="ceraimati">Cerai Mati</label>
                            </div>
                            @error('marital_status')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-6 flex justify-center">
                            <button type="submit"
                                class="px-4 py-2 text-gray-100 bg-blue-800 hover:bg-blue-900  font-semibold font-montserrat">SIMPAN
                                PERUBAHAN</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>


    </div>
</div>
