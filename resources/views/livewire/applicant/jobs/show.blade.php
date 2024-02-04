{{-- <div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Detail Lowongan</h2>
                </li>
                <li>
                    <div class="flex items-center w-full">
                        <div>
                            <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M12 6.43994V9.76994" stroke="#292D32" stroke-width="0.9120000000000001"
                                        stroke-miterlimit="10" stroke-linecap="round"></path>
                                    <path
                                        d="M12.02 2C8.34002 2 5.36002 4.98 5.36002 8.66V10.76C5.36002 11.44 5.08002 12.46 4.73002 13.04L3.46002 15.16C2.68002 16.47 3.22002 17.93 4.66002 18.41C9.44002 20 14.61 20 19.39 18.41C20.74 17.96 21.32 16.38 20.59 15.16L19.32 13.04C18.97 12.46 18.69 11.43 18.69 10.76V8.66C18.68 5 15.68 2 12.02 2Z"
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10"
                                        stroke-linecap="round"></path>
                                    <path
                                        d="M15.33 18.8201C15.33 20.6501 13.83 22.1501 12 22.1501C11.09 22.1501 10.25 21.7701 9.65004 21.1701C9.05004 20.5701 8.67004 19.7301 8.67004 18.8201"
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="flex items-center px-3 py-1 shadow-sm rounded-2xl bg-gray-50">
                            <div class="flex flex-col h-full mr-2">
                                <h6 class="text-sm font-semibold">
                                    {{ Auth::user()->username }}</h6>
                                <span class="text-xs">Pelamar</span>
                            </div>
                            @if (Auth::user()->applicantdata->photo ?? '')
                                <img class="rounded-full"
                                    src="{{ asset('storage/' . Auth::user()->applicantdata->photo) }}"
                                    width="35px" srcset="">
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="px-4 lg:px-12 lg:py-10 2xl:px-36">
        <div class="p-8 bg-white rounded-lg shadow-md ">
            <a wire:navigate href="/applicant/jobs" class="flex items-center mb-2 w-min">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 52 52"
                    enable-background="new 0 0 52 52" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0 L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29 h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z">
                        </path>
                    </g>
                </svg>
                <p class="ml-2 font-medium hover:underline">Kembali</p>
            </a>
            <div class="lg:flex">
                <img class="mb-2 rounded-lg lg:mr-6" src="{{ asset('storage/' . $job->image) }}" width="480px">
                <div class="flex flex-col">
                    <h2 class="text-xl font-semibold">{{ $job->position }}</h2>
                    <div class="mt-4">
                        <div class="flex items-baseline mt-6 mb-2">
                            <i class="mr-4 fa-solid fa-location-dot fa-lg"></i>
                            <p class="text-base text-neutral-600 dark:text-neutral-200">Penempatan :
                                {{ $job->jobcompany->name }}</p>
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="mr-3 fa-solid fa-user-graduate fa-lg"></i>
                            <p class="text-base text-neutral-600 dark:text-neutral-200">Pendidikan:
                                {{ $job->jobeducation->name }}</p>
                        </div>
                        <div class="flex items-baseline mb-2">
                            <i class="mr-3 fa-solid fa-map-location-dot fa-lg"></i>
                            <p class="text-base text-neutral-600 dark:text-neutral-200">
                                Alamat: {{ $job->jobcompany->address }}
                            </p>
                        </div>
                        <div class="flex items-baseline mb-2">
                            <i class="mr-3 fa-solid fa-layer-group fa-lg"></i>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                Jobdesk: {{ $job->jobdesk }}
                            </p>
                        </div>
                        <h3 class="mb-4 text-lg font-medium">Deskripsi Pekerjaan</h3>
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
                        @if (Auth::user())
                            <a wire:navigate href="/applicant/application/{{ $job->id }}/create">
                                <button
                                    class="px-4 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-800">
                                    Lamar Sekarang
                                </button>
                            </a>
                        @else
                            <a wire:navigate href="/login">
                                <button
                                    class="px-4 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-800">
                                    Lamar Sekarang
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> --}}

<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Detail Data Lowongan Kerja</h2>
    </div>
    <div x-data="{ zoomed: false, mouseX: 0, mouseY: 0, imageWidth: 0, imageHeight: 0, showModal: false, modalImage: '' }" x-on:mousemove="mouseX = $event.clientX; mouseY = $event.clientY"
        class="mt-4 w-full p-4 bg-gray-50 border border-blue-200">
        <a wire:navigate href="/hrd/jobs" class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 -960 960 960" class="w-5 h-5">
                <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
            </svg>
            <span class="text-sm font-poppins">Kembali</span>
        </a>
        <div class="flex lg:flex-row md:flex-row sm:flex-col mt-2">
            <!-- Gambar di samping kiri -->
            <div class="lg:w-1/3 mb-4 lg:mb-0 relative overflow-hidden" x-on:mouseleave="zoomed = false"
                x-ref="imageContainer">
                @if ($job->image)
                    <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->position }}"
                        class="w-full h-auto  transition-transform duration-300 transform-gpu cursor-pointer"
                        :class="{ 'scale-150 cursor-pointer': zoomed }"
                        x-on:mouseover="zoomed = true; imageWidth = $refs.imageContainer.clientWidth; imageHeight = $refs.imageContainer.clientHeight;"
                        x-bind:style="'transform-origin: ' + ((mouseX - $refs.imageContainer.getBoundingClientRect().left) /
                            imageWidth) *
                        100
                            +
                            '% ' + ((mouseY - $refs.imageContainer.getBoundingClientRect().top) / imageHeight) * 100 +
                            '%;'"
                        x-on:click="
showModal = true;
modalImage = '{{ asset('storage/' . $job->image) }}';
">
                @else
                    <img src="/images/hrd/job/default.jpg" alt="{{ $job->position }}"
                        class="w-full h-auto  transition-transform duration-300 transform-gpu cursor-pointer"
                        :class="{ 'scale-150 cursor-pointer': zoomed }"
                        x-on:mouseover="zoomed = true; imageWidth = $refs.imageContainer.clientWidth; imageHeight = $refs.imageContainer.clientHeight;"
                        x-bind:style="'transform-origin: ' + ((mouseX - $refs.imageContainer.getBoundingClientRect().left) /
                            imageWidth) *
                        100
                            +
                            '% ' + ((mouseY - $refs.imageContainer.getBoundingClientRect().top) / imageHeight) * 100 +
                            '%;'"
                        x-on:click="
showModal = true;
modalImage = '/images/hrd/job/default.jpg';
">
                @endif
            </div>
            <!-- Detail informasi di samping kanan -->
            <div class="lg:w-2/3 lg:pl-6">
                <dl class="-my-3 divide-y divide-gray-100 ">
                    <div class="py-2 ">
                        <h2 class="text-3xl font-semibold mb-2 text-gray-800">{{ $job->position }}</h2>
                    </div>

                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Perusahaan</dt>
                        <dd class="text-gray-700 sm:col-span-2"> {{ $job->jobcompany->name }}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Alamat</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $job->jobcompany->address }}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Min. Pendidikan</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $job->jobeducation->name }}</dd>
                    </div>
                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Jobdesk</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $job->jobdesk }}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Deskripsi Pekerjaan</dt>
                        <dd class="text-gray-700 sm:col-span-2"> {!! $job->description !!}

                        </dd>
                    </div>
                </dl>
            </div>
        </div>

    </div>
</div>
