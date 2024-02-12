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
                        @if (!auth()->user()->hrddata)
                            <h3 class="text-2xl font-semibold tracking-wide text-gray-800 font-montserrat">Akun
                            </h3>
                        @else
                            <div class="flex justify-between w-full">
                                <h3 class="text-2xl font-semibold tracking-wide text-gray-800 font-montserrat">Akun Saya
                                </h3>
                                <a wire:navigate href="/hrd/profile/myaccount/{{ auth()->user()->hrddata->id }}/edit"
                                    class="px-2 py-2 text-sm bg-blue-800 hover:bg-blue-900 text-gray-50 font-poppins">
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
                    <div>
                        <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Nama Lengkap</label>
                        <span
                            class="font-light text-gray-800 font-poppins">{{ auth()->user()->hrddata->full_name ?? 'Belum diisi' }}</span>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Posisi</label>
                        <span
                            class="font-light text-gray-800 font-poppins">{{ auth()->user()->hrddata->hrd_position ?? 'Belum diisi' }}</span>
                    </div>
                </div>



            </div>
        </div>


    </div>
</div>
