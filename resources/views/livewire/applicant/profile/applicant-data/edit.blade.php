<div>
    <div class="text-start">
        @include('dashboard.partials.profile.title')
    </div>
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
                    <a wire:navigate href="/applicant/profile/applicantdata" class="flex items-center gap-1"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-5 h-5">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                        </svg>
                        <span class="text-sm font-poppins">Kembali</span>
                    </a>
                    <div class="mb-3">
                        <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">Ubah Data
                            Pribadi
                        </h3>
                        <p class="my-2 text-sm font-light text-gray-800 font-poppins "> Pastikan anda mengubah data
                            dengan benar. Hal ini, karena Data tersebut akan menjadi pertimbangan penting dalam proses
                            seleksi lamaran.</p>
                        <hr class="mt-2">
                    </div>
                    <form wire:submit='update'>
                        <div class="mb-2">
                            <label for="nik"
                                class="block mb-1 font-semibold text-gray-800 font-poppins">NIK</label>
                            <input wire:model='ktp_number' type="text" id="nik" name="ktp_number"
                                placeholder="contoh: 1234567890123456"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 @error('ktp_number') border-red-500 @enderror"
                                required>
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
                                    placeholder="contoh: 01/30/2002"
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
                                class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins" for='pria'>
                                <input wire:model='gender' type="radio" id="pria" name="gender" value="Pria"
                                    class="mr-2" @if ($applicantdata->gender == 'Pria') checked @endif>
                                <span class="pl-2">Pria</span>
                            </label>
                            <label
                                class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins" for='wanita'>
                                <input wire:model='gender' type="radio" id="wanita" name="gender" value="Wanita"
                                    class="mr-2" @if ($applicantdata->gender == 'Wanita') checked @endif>
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
                                class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins" for='belumkawin'>
                                <input wire:model='marital_status' type="radio" id="belumkawin" name="marital_status"
                                    value="Belum Kawin" class="mr-2" @if ($applicantdata->marital_status == 'Belum Kawin') checked @endif>
                                <span class="pl-2">Belum Kawin</span>
                            </label>
                            <label
                                class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins" for='kawin'>
                                <input wire:model='marital_status' type="radio" id="kawin" name="marital_status"
                                    value="Kawin" class="mr-2" @if ($applicantdata->marital_status == 'Kawin') checked @endif>
                                <span class="pl-2">Kawin</span>
                            </label>
                            <label
                                class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins" for='ceraihidup'>
                                <input wire:model='marital_status' type="radio" id="ceraihidup" name="marital_status"
                                    value="Cerai Hidup" class="mr-2"@if ($applicantdata->marital_status == 'Cerai Hidup') checked @endif>
                                <span class="pl-2">Cerai Hidup</span>
                            </label>
                            <label
                                class="flex items-center px-3 py-2 my-1 text-gray-800 bg-gray-100 cursor-pointer hover:bg-blue-100 font-poppins" for='ceraimati'>
                                <input wire:model='marital_status' type="radio" id="ceraimati"
                                    name="marital_status" value="Cerai Mati" class="mr-2"
                                    @if ($applicantdata->marital_status == 'Cerai Mati') checked @endif>
                                <span class="pl-2">Cerai Mati</span>
                            </label>
                            @error('marital_status')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-center my-6">
                            <button type="submit"
                                class="px-4 py-2 font-semibold text-gray-100 bg-blue-800 hover:bg-blue-900 font-montserrat">SIMPAN
                                PERUBAHAN</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>


    </div>
</div>
