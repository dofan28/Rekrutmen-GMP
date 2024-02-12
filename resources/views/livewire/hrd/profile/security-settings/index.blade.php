<div>
    <div class="text-start">
        @include('dashboard.partials.profile.title')
    </div>
    @if (session()->has('success'))
    <x-alert type='success' :message="session('success')"></x-alert>
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
                    <div class="mb-3">
                        <h3 class="text-2xl font-semibold tracking-wide text-gray-800 font-montserrat">Pengaturan
                            Keamanan
                        </h3>
                        <hr class="mt-2">
                    </div>
                    <div class="mb-3">
                        <div class="mb-2">
                            <label for="email" class="block mb-1 font-semibold text-gray-800 font-poppins">Alamat Email
                            </label>
                            <div class="flex items-center gap-5">
                                <input type="text" id="email" value='{{ auth()->user()->email }}'   class="w-full px-3 py-2 mr-2 text-gray-800 bg-gray-200 border border-gray-400 appearance-none focus:outline-none focus:shadow-outline font-poppins " disabled
                                >
                                <a wire:navigate href="/hrd/profile/securitysettings/change-email" class="px-4 py-2 bg-blue-800 hover:bg-blue-900 text-gray-50 font-poppins">Ubah</a>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="block mb-1 font-semibold text-gray-800 font-poppins">Kata Sandi
                            </label>
                            <div class="flex items-center gap-5">
                                <input type="text" id="email" value='********'   class="w-full px-3 py-2 mr-2 text-gray-800 bg-gray-200 border border-gray-400 appearance-none focus:outline-none focus:shadow-outline font-poppins " disabled
                                >
                                <a wire:navigate href="/hrd/profile/securitysettings/change-password" class="px-4 py-2 bg-blue-800 hover:bg-blue-900 text-gray-50 font-poppins">Ubah</a>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>


    </div>
</div>
