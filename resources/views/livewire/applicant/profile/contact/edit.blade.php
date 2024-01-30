<div>
    <div class="text-start">
        @include('dashboard.partials.profile.title')
    </div>
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
                    <a wire:navigate href="/applicant/profile/contact" class="flex items-center gap-1"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-5 h-5">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                        </svg>
                        <span class="text-sm font-poppins">Kembali</span>
                    </a>
                    <div class="mb-3">
                        <h3 class="text-2xl font-semibold text-gray-800 tracking-wide font-montserrat">Ubah Kontak
                        </h3>
                        <p class="my-2 text-gray-800 text-sm font-light font-poppins "> Pastikan anda mengubah data
                            dengan benar. Hal ini, karena Data tersebut akan menjadi pertimbangan penting dalam proses
                            seleksi lamaran.</p>
                        <hr class="mt-2">
                    </div>
                    <form wire:submit='update'>
                        <div class="mb-2">
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins">Alamat
                                Lengkap
                            </label>
                            <label for="street" class="block text-gray-800 font-normal text-base font-poppins">Jalan
                            </label>
                            <input wire:model='street' type="text" id="street" name="street"
                                placeholder="contoh: Jalan Raya Pacing"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('street') border-red-500 @enderror"
                                required>
                            @error('street')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="subdistrict"
                                class="block text-gray-800 font-normal text-base font-poppins">Desa/Kecamatan
                            </label>
                            <input wire:model='subdistrict' type="text" id="subdistrict" name="subdistrict"
                                placeholder="contoh: Desa Mojokerep, Kecamatan Bangsal"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('subdistrict') border-red-500 @enderror"
                                required>
                            @error('subdistrict')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="city"
                                class="block text-gray-800 font-normal text-base font-poppins">Kota/Kabupaten
                            </label>
                            <input wire:model='city' type="text" id="city" name="city"
                                placeholder="contoh: Mojokerto"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('city') border-red-500 @enderror"
                                required>
                            @error('city')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="province"
                                class="block text-gray-800 font-normal text-base font-poppins">Provinsi
                            </label>
                            <input wire:model='province' type="text" id="province" name="province"
                                placeholder="contoh: Jawa Timur"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('province') border-red-500 @enderror"
                                required>
                            @error('province')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="postal_code" class="block text-gray-800 font-normal text-base font-poppins">Kode
                                Pos
                            </label>
                            <input wire:model='postal_code' type="number" id="postal_code" name="postal_code"
                                placeholder="contoh: 61381"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-3 @error('postal_code') border-red-500 @enderror"
                                required>
                            @error('postal_code')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins">Email (Aktif)</label>
                            <input wire:model='email' type="text" name="email"
                                placeholder="contoh: johndoe@gmail.com"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('email') border-red-500 @enderror border-gray-800"
                                required>
                            @error('email')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins">Nomor Telepon
                                (Aktif)</label>
                            <input wire:model='phone' type="text" name="phone" placeholder="contoh: 081234567890"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('phone') border-red-500 @enderror border-gray-800"
                                required>
                            @error('phone')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="block mb-1 text-gray-800 font-semibold font-poppins">Sosial Media
                            </label>
                            <label for="linkedin"
                                class="flex justify-between text-gray-800 font-normal text-base font-poppins">LinkedIn
                                <span class="text-xs font-light">(Opsional)</span>
                            </label>
                            <input wire:model='linkedin' type="text" id="linkedin" name="linkedin"
                                placeholder="Masukkan URL/Username Profil anda"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('linkedin') border-red-500 @enderror"
                                required>
                            @error('linkedin')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="facebook"
                                class="flex justify-between text-gray-800 font-normal text-base font-poppins">Facebook<span
                                    class="text-xs font-light">(Opsional)</span>
                            </label>
                            <input wire:model='facebook' type="text" id="facebook" name="facebook"
                                placeholder="Masukkan URL/Username Profil anda"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('facebook') border-red-500 @enderror"
                                required>
                            @error('facebook')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="instagram"
                                class="flex justify-between text-gray-800 font-normal text-base font-poppins">Instagram<span
                                    class="text-xs font-light">(Opsional)</span>
                            </label>
                            <input wire:model='instagram' type="text" id="instagram" name="instagram"
                                placeholder="Masukkan URL/Username Profil anda"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('instagram') border-red-500 @enderror"
                                required>
                            @error('instagram')
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
