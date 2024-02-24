<div>
    <div class="text-start">
        @include('dashboard.partials.profile.title')
    </div>
    @if (session()->has('success'))
        <x-alert type='success' :message="session('success')"></x-alert>
    @endif
    @if (session()->has('notification'))
        <x-alert type='warning' :message="session('notification')"></x-alert>
    @endif
    <!-- section content -->
    <div class="flex items-center justify-start w-full h-40 p-8 mt-4 overflow-hidden bg-gray-50">
        @include('dashboard.partials.profile.account-info')
    </div>
    <div class="grid grid-cols-12">

        <div
            class="flex flex-wrap justify-center w-full col-span-12 py-6 pr-3 space-x-4 space-y-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start">
            @include('dashboard.partials.profile.navigation')
        </div>

        <div
            class="h-full col-span-12 pb-12 md:border-solid md:border-l md:border-gray-800 md:border-opacity-25 md:col-span-10">
            <div class="py-4 md:pl-4">
                <div class="flex flex-col p-4 space-y-4 bg-gray-50">
                    @include('dashboard.partials.profile.warning-info')
                    <div class="mb-3">
                        @if (!auth()->user()->applicantdata)
                            <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">Data
                                Pribadi
                            </h3>
                            <p class="my-2 text-sm font-light text-gray-800 font-poppins "><span
                                    class="font-semibold text-red-600">*</span> Anda harus melengkapi data
                                dibawah.
                                Untuk dapat mengajukan lamaran pada lowongan kerja yang tersedia, mohon segera
                                melengkapinya dengan benar.</p>
                        @else
                            <div class="flex justify-between w-full">
                                <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">Data
                                    Pribadi
                                </h3>
                                <a wire:navigate
                                    href="/applicant/profile/applicantdata/{{ auth()->user()->applicantdata->id }}/edit"
                                    class="relative  w-36 h-8 cursor-pointer flex items-center border border-blue-800 bg-blue-800 group hover:bg-blue-900 active:bg-blue-900 active:border-blue-900">
                                    <span
                                        class="text-gray-50 text-sm ml-5 transform group-hover:translate-x-20 transition-all duration-300 font-poppins">Ubah
                                        Data</span>
                                    <span
                                        class="absolute right-0 h-full w-10  bg-blue-800 flex items-center justify-center transform group-hover:translate-x-0 group-hover:w-full transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                            class="svg w-8 text-gray-50" fill='#f9fafb' height="24" width="24">
                                            <path
                                                d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        @endif
                        <hr class="mt-2">
                    </div>
                    @if (auth()->user()->applicantdata)
                        <div>
                            <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">NIK</label>
                            <span
                                class="font-light text-gray-800 font-poppins">{{ auth()->user()->applicantdata->ktp_number ?? 'Belum diisi' }}</span>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Nama
                                Lengkap</label>
                            <span
                                class="font-light text-gray-800 font-poppins">{{ auth()->user()->applicantdata->full_name ?? 'Belum diisi' }}</span>
                        </div>
                        <div class="flex">
                            <div>
                                <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Tempat
                                    Lahir</label>
                                <span
                                    class="font-light text-gray-800 font-poppins">{{ auth()->user()->applicantdata->place_of_birth ?? 'Belum diisi' }}</span>
                            </div>
                            <div class="ml-8">
                                <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Tanggal
                                    Lahir</label>
                                <span
                                    class="font-light text-gray-800 font-poppins">{{ auth()->user()->applicantdata->date_of_birth ?? 'Belum diisi' }}</span>
                            </div>

                        </div>
                        <div>
                            <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Jenis
                                Kelamin</label>
                            <span
                                class="font-light text-gray-800 font-poppins">{{ auth()->user()->applicantdata->gender ?? 'Belum diisi' }}</span>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Status
                                Perkawinan</label>
                            <span
                                class="font-light text-gray-800 font-poppins">{{ auth()->user()->applicantdata->marital_status ?? 'Belum diisi' }}</span>
                        </div>
                    @else
                        <form wire:submit='save'>
                            <div class="mb-2">
                                <label for="nik" class="block mb-1 font-semibold text-gray-800 font-poppins">NIK
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
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Nama Lengkap (Sesuai
                                    KTP) </label>
                                <input wire:model='full_name' type="text" name="full_name"
                                    placeholder="contoh: John Doe"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('full_name') border-red-500 @enderror border-gray-800"
                                    required>
                                @error('full_name')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                                <div class="w-full">
                                    <label class="block mb-1 font-semibold text-gray-800 font-poppins">Tempat
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
                                    <label class="block mb-1 font-semibold text-gray-800 font-poppins">Tanggal
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
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Jenis
                                    Kelamin </label>
                                <label
                                    class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins"
                                    for='pria'>
                                    <input wire:model='gender' type="radio" id="pria" name="gender"
                                        value="Pria" class="mr-2">
                                    <span class="pl-2">Pria</span>
                                </label>
                                <label
                                    class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins"
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
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Status
                                    Perkawinan </label>
                                <label
                                    class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins"
                                    for='belumkawin'>
                                    <input wire:model='marital_status' type="radio" id="belumkawin"
                                        name="marital_status" value="Belum Kawin" class="mr-2">
                                    <span class="pl-2">Belum Kawin</span>
                                </label>
                                <label
                                    class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins"
                                    for='kawin'>
                                    <input wire:model='marital_status' type="radio" id="kawin"
                                        name="marital_status" value="Kawin" class="mr-2">
                                    <span class="pl-2">Kawin</span>
                                </label>
                                <label
                                    class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins"
                                    for='ceraihidup'>
                                    <input wire:model='marital_status' type="radio" id="ceraihidup"
                                        name="marital_status" value="Cerai Hidup" class="mr-2">
                                    <span class="pl-2">Cerai Hidup</span>
                                </label>
                                <label
                                    class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins"
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
                                <label class="flex justify-between text-base font-semibold text-gray-800 font-poppins"
                                    for="photo">Unggah Foto
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
                                            ">
                                </label>
                                @error('photo')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex justify-center my-6">
                                <button type="submit"
                                    class="px-4 py-2 font-semibold text-gray-100 bg-blue-800 hover:bg-blue-900 font-montserrat">SIMPAN</button>
                            </div>
                        </form>
                    @endif

                </div>



            </div>
        </div>


    </div>
</div>
