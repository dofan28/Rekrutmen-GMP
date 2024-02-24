<div>
    <div class="text-start">
        @include('dashboard.partials.profile.title')
    </div>
    @if (session()->has('success'))
        <x-alert type='success' :message="session('success')"></x-alert>
    @endif
    @if (session()->has('notification'))
        <x-alert type='notification' :message="session('notification')"></x-alert>
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
                        @if (!auth()->user()->contact)
                            <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">Kontak
                            </h3>
                            <p class="my-2 text-sm font-light text-gray-800 font-poppins "><span
                                    class="font-semibold text-red-600">*</span> Anda harus melengkapi data
                                dibawah.
                                Untuk dapat mengajukan lamaran pada lowongan kerja yang tersedia, mohon segera
                                melengkapinya dengan benar.</p>
                        @else
                            <div class="flex justify-between w-full">
                                <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">Kontak
                                </h3>
                                <a wire:navigate
                                    href="/applicant/profile/contact/{{ auth()->user()->contact->id }}/edit"
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
                    @if (auth()->user()->contact)
                        <div>
                            <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Alamat
                                Lengkap</label>
                            <span class="font-light text-gray-800 font-poppins">
                                @if (auth()->user()->contact)
                                    {{ auth()->user()->contact->getFullAddress() }}
                                @else
                                    Belum diisi
                                @endif
                            </span>

                        </div>
                        <div>
                            <label
                                class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Email</label>
                            <span class="font-light text-gray-800 font-poppins">
                                @if (auth()->user()->contact)
                                    {{ auth()->user()->contact->email }}
                                @else
                                    Belum diisi
                                @endif
                            </span>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Nomor
                                Telepon</label>
                            <span class="font-light text-gray-800 font-poppins">
                                @if (auth()->user()->contact)
                                    {{ auth()->user()->contact->phone }}
                                @else
                                    Belum diisi
                                @endif
                            </span>
                        </div>
                        <div>
                            <label
                                class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">LinkedIn</label>
                            <span class="font-light text-gray-800 font-poppins">
                                @if (auth()->user()->contact)
                                    {{ auth()->user()->contact->linkedin }}
                                @else
                                    Belum diisi
                                @endif
                            </span>
                        </div>
                        <div>
                            <label
                                class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Facebook</label>
                            <span class="font-light text-gray-800 font-poppins">
                                @if (auth()->user()->contact)
                                    {{ auth()->user()->contact->facebook }}
                                @else
                                    Belum diisi
                                @endif
                            </span>
                        </div>
                        <div>
                            <label
                                class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Instagram</label>
                            <span class="font-light text-gray-800 font-poppins">
                                @if (auth()->user()->contact)
                                    {{ auth()->user()->contact->instagram }}
                                @else
                                    Belum diisi
                                @endif
                            </span>
                        </div>
                    @else
                        <form wire:submit='save'>
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Alamat
                                    Lengkap
                                </label>
                                <label for="street"
                                    class="block text-base font-normal text-gray-800 font-poppins">Jalan
                                </label>
                                <input wire:model='street' type="text" id="street" name="street"
                                    placeholder="contoh: Jalan Raya Pacing"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('street') border-red-500 @enderror"
                                    autofocus required>
                                @error('street')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                                <label for="subdistrict"
                                    class="block text-base font-normal text-gray-800 font-poppins">Desa/Kecamatan
                                </label>
                                <input wire:model='subdistrict' type="text" id="subdistrict" name="subdistrict"
                                    placeholder="contoh: Desa Mojokerep, Kecamatan Bangsal"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('subdistrict') border-red-500 @enderror"
                                    autofocus required>
                                @error('subdistrict')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                                <label for="city"
                                    class="block text-base font-normal text-gray-800 font-poppins">Kota/Kabupaten
                                </label>
                                <input wire:model='city' type="text" id="city" name="city"
                                    placeholder="contoh: Mojokerto"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('city') border-red-500 @enderror"
                                    autofocus required>
                                @error('city')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                                <label for="province"
                                    class="block text-base font-normal text-gray-800 font-poppins">Provinsi
                                </label>
                                <input wire:model='province' type="text" id="province" name="province"
                                    placeholder="contoh: Jawa Timur"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('province') border-red-500 @enderror"
                                    autofocus required>
                                @error('province')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                                <label for="postal_code"
                                    class="block text-base font-normal text-gray-800 font-poppins">Kode Pos
                                </label>
                                <input wire:model='postal_code' type="number" id="postal_code" name="postal_code"
                                    placeholder="contoh: 61381"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-3 @error('postal_code') border-red-500 @enderror"
                                    autofocus required>
                                @error('postal_code')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Nomor Telepon
                                    (Aktif)</label>
                                <input wire:model='phone' type="text" name="phone"
                                    placeholder="contoh: 081234567890"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('phone') border-red-500 @enderror border-gray-800"
                                    required>
                                @error('phone')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Sosial Media
                                </label>
                                <label for="linkedin"
                                    class="flex justify-between text-base font-normal text-gray-800 font-poppins">LinkedIn
                                    <span class="text-xs font-light">(Opsional)</span>
                                </label>
                                <input wire:model='linkedin' type="text" id="linkedin" name="linkedin"
                                    placeholder="Masukkan URL/Username Profil anda"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('linkedin') border-red-500 @enderror">
                                @error('linkedin')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                                <label for="facebook"
                                    class="flex justify-between text-base font-normal text-gray-800 font-poppins">Facebook<span
                                        class="text-xs font-light">(Opsional)</span>
                                </label>
                                <input wire:model='facebook' type="text" id="facebook" name="facebook"
                                    placeholder="Masukkan URL/Username Profil anda"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('facebook') border-red-500 @enderror">
                                @error('facebook')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                                <label for="instagram"
                                    class="flex justify-between text-base font-normal text-gray-800 font-poppins">Instagram<span
                                        class="text-xs font-light">(Opsional)</span>
                                </label>
                                <input wire:model='instagram' type="text" id="instagram" name="instagram"
                                    placeholder="Masukkan URL/Username Profil anda"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 mb-2 @error('instagram') border-red-500 @enderror">
                                @error('instagram')
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
