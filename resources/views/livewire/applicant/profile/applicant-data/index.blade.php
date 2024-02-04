<div>
    <div class="text-start">
        @include('dashboard.partials.profile.title')
    </div>

    <!-- section content -->
    <div class="flex justify-start items-center mt-4 p-8 h-40 w-full overflow-hidden bg-gray-50">
        @include('dashboard.partials.profile.account-info')
    </div>
    <div class="grid grid-cols-12">

        <div
            class="col-span-12 w-full pr-3 py-6 justify-center flex flex-wrap space-x-4 space-y-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start">
            @include('dashboard.partials.profile.navigation')
        </div>

        <div
            class="col-span-12 md:border-solid md:border-l md:border-gray-800 md:border-opacity-25 h-full pb-12 md:col-span-10">
            <div class="py-4 md:pl-4">
                <div class="flex flex-col space-y-4 bg-gray-50 p-4">
                    <!-- component -->
                    <div class="max-w-3xl">
                        @if (
                            !auth()->user()->applicantdata ||
                                !auth()->user()->contact ||
                                auth()->user()->educationalbackground->isEmpty() ||
                                auth()->user()->workexperience->isEmpty() ||
                                auth()->user()->organizationalexperience->isEmpty())
                            <div class="bg-yellow-100 border-l-4 border-yellow-600 p-4">

                                <div class="flex space-x-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960"
                                            width="35" fill='#d97706'>
                                            <path
                                                d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-88h120v88q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Zm120-160h80v-200h-80v200Zm40 120q17 0 28.5-11.5T520-360q0-17-11.5-28.5T480-400q-17 0-28.5 11.5T440-360q0 17 11.5 28.5T480-320Z" />
                                        </svg>
                                    </div>

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
                                </div>
                            </div>
                        @endif
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
                                <a wire:navigate
                                    href="/applicant/profile/applicantdata/{{ auth()->user()->applicantdata->id }}/edit"
                                    class="bg-blue-800 hover:bg-blue-900 px-2 py-2 text-gray-50 font-poppins text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                        class="inline-block w-4 h-4" fill='#f9fafb'>
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                    </svg>
                                    <span class="inline-block">Ubah Data</span>
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
                                <label class="block mb-1 text-gray-800 font-semibold font-poppins tracking-wide">Tanggal
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
                                </label>
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
                                    KTP) </label>
                                <input wire:model='full_name' type="text" name="full_name"
                                    placeholder="contoh: John Doe"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('full_name') border-red-500 @enderror border-gray-800"
                                    required>
                                @error('full_name')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4 mb-2">
                                <div class="w-full">
                                    <label class="block mb-1 text-gray-800 font-semibold font-poppins">Tempat
                                        Lahir </label>
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
                                        Lahir </label>
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
                                    Kelamin </label>
                                <label
                                    class="flex bg-gray-100 text-gray-800 items-center px-3 py-2 my-1  hover:bg-blue-100 cursor-pointer font-poppins"
                                    for='pria'>
                                    <input wire:model='gender' type="radio" id="pria" name="gender"
                                        value="Pria" class="mr-2">
                                    <span class="pl-2">Pria</span>
                                </label>
                                <label
                                    class="flex bg-gray-100 text-gray-800 items-center px-3 py-2 my-1  hover:bg-blue-100 cursor-pointer font-poppins"
                                    for='wanita'>
                                    <input wire:model='gender' type="radio" id="wanita" name="gender"
                                        value="Wanita" class="mr-2">
                                    <span class="pl-2">Wanita</span>
                                </label>
                                @error('gender')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="block mb-1 text-gray-800 font-semibold font-poppins">Status
                                    Perkawinan </label>
                                <label
                                    class="flex bg-gray-100 text-gray-800 items-center px-3 py-2 my-1  hover:bg-blue-100 cursor-pointer font-poppins"
                                    for='belumkawin'>
                                    <input wire:model='marital_status' type="radio" id="belumkawin"
                                        name="marital_status" value="Belum Kawin" class="mr-2">
                                    <span class="pl-2">Belum Kawin</span>
                                </label>
                                <label
                                    class="flex bg-gray-100 text-gray-800 items-center px-3 py-2 my-1  hover:bg-blue-100 cursor-pointer font-poppins"
                                    for='kawin'>
                                    <input wire:model='marital_status' type="radio" id="kawin"
                                        name="marital_status" value="Kawin" class="mr-2">
                                    <span class="pl-2">Kawin</span>
                                </label>
                                <label
                                    class="flex bg-gray-100 text-gray-800 items-center px-3 py-2 my-1  hover:bg-blue-100 cursor-pointer font-poppins"
                                    for='ceraihidup'>
                                    <input wire:model='marital_status' type="radio" id="ceraihidup"
                                        name="marital_status" value="Cerai Hidup" class="mr-2">
                                    <span class="pl-2">Cerai Hidup</span>
                                </label>
                                <label
                                    class="flex bg-gray-100 text-gray-800 items-center px-3 py-2 my-1  hover:bg-blue-100 cursor-pointer font-poppins"
                                    for='ceraimati'>
                                    <input wire:model='marital_status' type="radio" id="ceraimati"
                                        name="marital_status" value="Cerai Mati" class="mr-2">
                                    <span class="pl-2">Cerai Mati</span>
                                </label>
                                @error('marital_status')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label
                                class="flex justify-between text-gray-800 font-semibold text-base font-poppins" for="photo">Unggah Foto
                                <span class="text-xs font-light">(Opsional)</span>
                            </label>
                                <label class="block">
                                    <input wire:model='photo' type="file" accept="image/*" id="photo"
                                        class="block w-full text-gray-800 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins  border-gray-800 @error('photo') border-red-500 @enderror
                                              file:me-4 file:py-2 file:px-3
                                               file:border-0
                                              file:text-sm file:font-semibold
                                              file:bg-blue-800 file:text-white
                                              hover:file:bg-blue-900
                                              file:disabled:opacity-50 file:disabled:pointer-events-none
                                            " >
                                </label>
                                @error('photo')
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
