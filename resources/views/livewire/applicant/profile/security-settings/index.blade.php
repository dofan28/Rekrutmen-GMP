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
                    <div class="mb-3">
                        <h3 class="text-2xl font-semibold text-gray-800 tracking-wide font-montserrat">Pengaturan
                            Keamanan
                        </h3>
                        <hr class="mt-2">
                    </div>
                    <div class="mb-3">
                        <div class="mb-2">
                            <label for="email" class="block mb-1 text-gray-800 font-semibold font-poppins">Alamat Email
                            </label>
                            <div class="flex items-center gap-5">
                                <input type="text" id="email" value='{{ auth()->user()->email }}'   class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline  border font-poppins  border-gray-400 bg-gray-200 " disabled
                                >
                                <a wire:navigate href="/applicant/profile/securitysettings/change-email" class="px-4 py-2 bg-blue-800 hover:bg-blue-900 text-gray-50 font-poppins">Ubah</a>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="block mb-1 text-gray-800 font-semibold font-poppins">Kata Sandi
                            </label>
                            <div class="flex items-center gap-5">
                                <input type="text" id="email" value='********'   class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline  border font-poppins  border-gray-400 bg-gray-200 " disabled
                                >
                                <a wire:navigate href="/applicant/profile/securitysettings/change-password" class="px-4 py-2 bg-blue-800 hover:bg-blue-900 text-gray-50 font-poppins">Ubah</a>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>


    </div>
</div>
