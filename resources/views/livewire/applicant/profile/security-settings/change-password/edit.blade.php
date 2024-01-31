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
                        <h3 class="text-2xl font-semibold text-gray-800 tracking-wide font-montserrat">Ganti Kata Sandi
                        </h3>

                        <hr class="mt-2">
                    </div>
                    <form wire:submit='update'>
                        <div class="mb-2">
                            <label for="current_password"
                                class="block mb-1 text-gray-800 font-semibold font-poppins">Kata Sandi Sekarang</label>
                            <input wire:model='current_password' type="password" id="current_password" name="current_password"
                                placeholder="********"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 @error('current_password') border-red-500 @enderror"
                                required>
                            @error('current_password')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="password"
                                class="block mb-1 text-gray-800 font-semibold font-poppins">Kata Sandi Baru</label>
                            <input wire:model='password' type="password" id="password" name="password"
                                placeholder="********"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 @error('password') border-red-500 @enderror"
                                required>
                            @error('password')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="password_confirmation"
                                class="block mb-1 text-gray-800 font-semibold font-poppins">Konfirmasi Kata Sandi Baru</label>
                            <input wire:model='password_confirmation' type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="********"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 @error('password_confirmation') border-red-500 @enderror"
                                required>
                            @error('password_confirmation')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="my-6 flex justify-center">
                            <button type="submit"
                                class="px-4 py-2 text-gray-100 bg-blue-800 hover:bg-blue-900  font-semibold font-montserrat">SIMPAN PERUBAHAN</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>


    </div>
</div>
