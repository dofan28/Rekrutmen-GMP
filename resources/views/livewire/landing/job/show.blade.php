<div>
    <div class="py-20 px-4 xl:px-12 2xl:px-36">
        <h1 class="font-semibold uppercase text-3xl lg:text-4xl py-6">Detail Lowongan</h1>
        <div class="bg-white p-8 rounded-lg shadow-md ">
            <a wire:navigate href="/jobs" class="flex w-min items-center mb-2">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0 L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29 h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"></path> </g></svg>
                <p class="ml-2 hover:underline font-medium">Kembali</p>
            </a>
            <div class="lg:flex">
                <img class="rounded-lg lg:mr-6 mb-2" src="{{ asset('storage/' . $job->image) }}" width="480px">
            <div class="flex flex-col">
                <h2 class="text-xl font-semibold">{{ $job->position }}</h2>
                <div class="mt-6">
                    <div class="flex items-baseline mb-2 mt-6">
                        <i class="fa-solid fa-location-dot fa-lg mr-4"></i>
                        <p class="text-base text-neutral-600 dark:text-neutral-200">Penempatan :
                            {{ $job->jobcompany->name }}</p>
                    </div>
                    <div class="flex items-center mb-2">
                        <i class="fa-solid fa-user-graduate fa-lg mr-3"></i>
                        <p class="text-base text-neutral-600 dark:text-neutral-200">Pendidikan:
                            {{ $job->jobeducation->name }}</p>
                    </div>
                    <div class="flex items-baseline mb-2">
                        <i class="fa-solid fa-map-location-dot fa-lg mr-3"></i>
                        <p class="text-base text-neutral-600 dark:text-neutral-200">
                            Alamat: {{ $job->jobcompany->address }}
                        </p>
                    </div>
                    <div class="flex items-baseline mb-2">
                        <i class="fa-solid fa-layer-group fa-lg mr-3"></i>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            Jobdesk: {{ $job->jobdesk }}
                        </p>
                    </div>
                    <h3 class="text-lg font-medium mb-4">Deskripsi Pekerjaan</h3>
                    <p class="text-base text-gray-600">{!! $job->description !!} </p>
                </div>

                <div class="mt-6">
                    <h3 class="text-lg font-medium">Deskripsi Perusahaan</h3>
                </div>
                <div class="mt-4">
                    <p class="text-base text-gray-600">Nama Perusahaan: {{ $job->jobcompany->name }}</p>
                    <p class="text-base text-gray-600">Alamat: {{ $job->jobcompany->address }}</p>
                </div>
                <div class="flex justify-end mt-6">
                    @if (Auth::guard('applicant')->check())
                        <a wire:navigate href="/applicant/application/{{ $job->id }}/create">
                            <button class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded font-semibold">
                                Lamar Sekarang
                            </button>
                        </a>
                    @else
                        <a wire:navigate href="/login">
                            <button class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded font-semibold">
                                Lamar Sekarang
                            </button>
                        </a>
                    @endif
                </div>
            </div>

            </div>
        </div>
    </div>
</div>
