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
                    <a wire:navigate href="/applicant/profile/securitysettings" class="flex items-center gap-1"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-5 h-5">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                        </svg>
                        <span class="text-sm font-poppins">Kembali</span>
                    </a>
                    <div class="mb-3">
                        <h3 class="text-2xl font-semibold text-gray-800 tracking-wide font-montserrat">Ubah Alamat Email
                        </h3>
                        <p class="my-2 text-gray-800 text-sm font-light font-poppins "> Pastikan anda menggunakan email yang masih aktif untuk mengubah alamat email baru. Kami akan mengirimkan tautan verifikasi kembali ke alamat email baru anda.</p>
                        <hr class="mt-2">
                    </div>
                    <form wire:submit='update'>
                        <div class="mb-2">
                            <label for="current_email"
                                class="block mb-1 text-gray-800 font-semibold font-poppins">Alamat Email
                                Sekarang</label>
                            <input type="email" id="current_email" name="current_email" value="{{ auth()->user()->email }}"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 border font-poppins border-gray-400 bg-gray-200" disabled>

                        </div>
                        <div class="mb-2">
                            <label for="email" class="block mb-1 text-gray-800 font-semibold font-poppins">Alamat
                                Email Baru (Aktif)</label>
                            <input wire:model='email' type="email" id="email" name="email"
                                placeholder="contoh: johndoe@gmail.com"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 @error('email') border-red-500 @enderror"
                                required>
                            @error('email')
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
