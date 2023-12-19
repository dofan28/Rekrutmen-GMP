<div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Lowongan</h2>
                </li>
                <li class="justify-center hidden w-full md:flex">
                    <div class="flex items-center py-1.5 px-2 w-2/3 bg-slate-200 rounded-xl">
                        <input wire:model.live="search" type="text" placeholder="Cari ..."
                            class="w-full ml-2 outline-none bg-slate-200">
                        <svg class="" width="24px" height="24px" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
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
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10">
                                    </path>
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
                                    src="{{ asset('storage/' . Auth::user()->applicantdata->photo) }}" width="35px"
                                    srcset="">
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
            <div class="flex justify-center m-4 md:hidden">
                <div class="flex items-center py-1.5 px-2 w-full sm:w-2/3 bg-slate-200 rounded-xl ">
                    <input wire:model.live="search" type="text" placeholder="Cari ..."
                        class="w-full ml-2 outline-none bg-slate-200">
                    <svg class="" width="24px" height="24px" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </nav>
    </header>

    @if ($jobs->where('deleted_at', null)->isEmpty())
        <div class="mt-24 text-gray-600">
            <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Maaf, saat ini kami tidak memiliki lowongan
                pekerjaan yang tersedia. </h1>
            <h3 class="text-lg text-center lg:text-xl">Terima kasih telah berkunjung ke website kami.</h3>
        </div>
    @else
        <div class="px-6 py-4 lg:px-20 xl:px-36">
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3 justify-evenly">
                @foreach ($jobs as $job)
                    <div wire:key="{{ $job->id }}"
                        class="flex flex-col rounded-sm justify-between dark:bg-neutral-700 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] w-full ">
                        <div class="flex flex-col flex-wrap justify-start p-6">
                            <img class="object-cover object-top w-full h-48 mb-2 rounded-lg"
                                src="{{ asset('storage/' . $job->image) }}">
                            <h5 class="mb-4 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                                {{ $job->position }}</h5>
                            <div class="flex items-center mb-2">
                                <i class="mr-4 fa-solid fa-location-dot fa-lg"></i>
                                <p class="text-neutral-600 dark:text-neutral-200">Penempatan :
                                    {{ $job->jobcompany->name }}
                                </p>
                            </div>
                            <div class="flex items-center mb-2">
                                <i class="mr-3 fa-solid fa-user-graduate fa-lg"></i>
                                <p class="text-neutral-600 dark:text-neutral-200">Pendidikan:
                                    {{ $job->jobeducation->name }}
                                </p>
                            </div>
                            <div class="flex items-baseline mb-2">
                                <i class="mr-3 fa-solid fa-map-location-dot fa-lg"></i>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    Alamat: {{ $job->jobcompany->address }}
                                </p>
                            </div>
                            <div class="flex items-baseline">
                                <i class="mr-3 fa-solid fa-layer-group fa-lg"></i>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    Jobdesk: {{ $job->jobdesk }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col mx-6 mb-6 inset-y-6">
                            <a wire:navigate href="/applicant/jobs/{{ $job->id }}"><button
                                    class="flex justify-center w-full p-2 mt-auto mb-4 text-white bg-blue-600 rounded-md hover:bg-blue-800">
                                    Detail
                                </button></a>
                            <p class="text-xs text-neutral-500 dark:text-neutral-300">
                                {{ $job->created_at }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
