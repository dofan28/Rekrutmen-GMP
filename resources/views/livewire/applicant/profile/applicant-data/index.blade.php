<div class=" px-9">

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
                    <!-- component -->
                    <div class="max-w-3xl">
                        <div class="bg-yellow-100 border-l-4 border-yellow-600 p-4">

                            <div class="flex space-x-2">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960"
                                        width="35" fill='#d97706'>
                                        <path
                                            d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-88h120v88q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Zm120-160h80v-200h-80v200Zm40 120q17 0 28.5-11.5T520-360q0-17-11.5-28.5T480-400q-17 0-28.5 11.5T440-360q0 17 11.5 28.5T480-320Z" />
                                    </svg>
                                </div>
                                @if (
                                    !auth()->user()->applicantdata &&
                                        !auth()->user()->contact &&
                                        auth()->user()->educationalbackground->isEmpty() &&
                                        auth()->user()->workexperience->isEmpty() &&
                                        auth()->user()->organizationalexperience->isEmpty())
                                    <div>
                                        <h4 class="text-yellow-600 font-montserrat font-semibold text-base">PERHATIAN!
                                        </h4>
                                        <div class="text-gray-800 font-poppins text-sm font-light text-justify	">
                                            Jika Anda belum melengkapi data profil Anda, harap isi dengan benar. Data
                                            tersebut akan menjadi bagian penting dalam proses melamar lowongan kerja
                                            atau seleksi lamaran. Informasi yang perlu dilengkapi meliputi:
                                            <ul class="list-disc ml-6 my-1">
                                                <li>Data Pribadi <span class="text-red-600 font-semibold">*</span></li>
                                                <li>Kontak <span class="text-red-600 font-semibold">*</span></li>
                                                <li>Riwayat Pendidikan (Opsional)</li>
                                                <li>Pengalaman Kerja (Opsional)</li>
                                                <li>Pengalaman Organisasi (Opsional)</li>
                                            </ul>

                                            Meskipun bersifat opsional, Data mengenai Riwayat Pendidikan, Pengalaman
                                            Kerja, dan Pengalaman Organisasi akan menjadi nilai tambah dalam proses
                                            seleksi lamaran.
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        @if (!auth()->user()->applicantdata)
                            <h3 class="text-2xl font-semibold text-gray-800 tracking-wide font-montserrat">Data
                                Pribadi
                            </h3>
                            <p class="my-2 text-gray-800 text-sm font-light font-poppins "><span
                                    class="text-red-600 font-semibold">*</span> Anda harus melengkapi data
                                dibawah.
                                Untuk dapat mengajukan lamaran pada lowongan kerja yang tersedia, mohon segera
                                melengkapinya dengan benar.</p>
                        @else
                            <div class="flex w-full justify-between">
                                <h3 class="text-2xl font-semibold text-gray-800 tracking-wide font-montserrat">Data
                                    Pribadi
                                </h3>
                                <a href="/applicant/profile/applicantdata/{{ auth()->user()->applicantdata->id }}/edit"
                                    class="bg-blue-800 hover:bg-blue-900 px-3 py-2 text-gray-50 font-poppins">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                        class="inline-block w-4 h-4" fill='#f9fafb'>
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                    </svg>
                                    <span class="inline-block">Edit</span>
                                </a>
                            </div>
                        @endif
                        <hr class="mt-2">
                    </div>
                    @if (auth()->user()->applicantdata)
                        <div>
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins tracking-wide">NIK</label>
                            <span
                                class="text-gray-800 font-light font-poppins">{{ auth()->user()->applicantdata->ktp_number ?? 'Belum diisi' }}</span>
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins tracking-wide">Nama
                                Lengkap</label>
                            <span
                                class="text-gray-800 font-light font-poppins">{{ auth()->user()->applicantdata->full_name ?? 'Belum diisi' }}</span>
                        </div>
                        <div class="flex">
                            <div>
                                <label class="block mb-1 text-gray-800 font-semibold font-poppins tracking-wide">Tempat
                                    Lahir</label>
                                <span
                                    class="text-gray-800 font-light font-poppins">{{ auth()->user()->applicantdata->place_of_birth ?? 'Belum diisi' }}</span>
                            </div>
                            <div class="ml-8">
                                <label
                                    class="block mb-1 text-gray-800 font-semibold font-poppins tracking-wide">Tanggal
                                    Lahir</label>
                                <span
                                    class="text-gray-800 font-light font-poppins">{{ auth()->user()->applicantdata->date_of_birth ?? 'Belum diisi' }}</span>
                            </div>

                        </div>
                        <div>
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins tracking-wide">Jenis
                                Kelamin</label>
                            <span
                                class="text-gray-800 font-light font-poppins">{{ auth()->user()->applicantdata->gender ?? 'Belum diisi' }}</span>
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins tracking-wide">Status
                                Perkawinan</label>
                            <span
                                class="text-gray-800 font-light font-poppins">{{ auth()->user()->applicantdata->marital_status ?? 'Belum diisi' }}</span>
                        </div>
                    @else
                        <form wire:submit='save'>
                            <div class="mb-2">
                                <label for="nik" class="block mb-1 text-gray-800 font-semibold font-poppins">NIK
                                    <span class="text-red-600 font-semibold">*</span></label>
                                <input wire:model='ktp_number' type="text" id="nik" name="ktp_number"
                                    placeholder="contoh: 1234567890123456"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 @error('ktp_number') border-red-500 @enderror"
                                    autofocus required>
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
                                        placeholder="contoh: 01/30/2024"
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
                                        value="Pria" class="mr-2">
                                    <label for="pria">Pria</label>
                                </div>

                                <div class="text-gray-800 font-poppins">
                                    <input wire:model='gender' type="radio" id="Wanita" name="gender"
                                        value="Wanita" class="mr-2">
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
                                        name="marital_status" value="Belum Kawin" class="mr-2">
                                    <label for="belumkawin">Belum Kawin</label>
                                </div>
                                <div class="text-gray-800 font-poppins">
                                    <input wire:model='marital_status' type="radio" id="kawin"
                                        name="marital_status" value="Kawin" class="mr-2">
                                    <label for="kawin">Kawin</label>
                                </div>
                                <div class="text-gray-800 font-poppins">
                                    <input wire:model='marital_status' type="radio" id="cerai"
                                        name="marital_status" value="Cerai" class="mr-2">
                                    <label for="cerai">Cerai</label>
                                </div>
                                <div class="text-gray-800 font-poppins">
                                    <input wire:model='marital_status' type="radio" id="ceraimati"
                                        name="marital_status" value="Cerai Mati" class="mr-2">
                                    <label for="ceraimati">Cerai Mati</label>
                                </div>
                                @error('marital_status')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-6 flex justify-center">
                                <button type="submit"
                                    class="px-4 py-2 text-gray-100 bg-blue-800 hover:bg-blue-900  font-semibold font-montserrat">SIMPAN</button>
                            </div>
                        </form>
                    @endif

                </div>



            </div>
        </div>


    </div>
</div>
