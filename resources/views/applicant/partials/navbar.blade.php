{{-- <header>
    <nav class="w-full py-3">
        <ul class="flex items-center justify-between w-full h-full text-gray-600">
            <li>
                <h2 class="text-2xl font-semibold ml-14 md:text-3xl">{{ $title }}</h2>
            </li>
            <li>
                <div class="hidden lg:block">
                    <div class="flex items-center justify-between">
                        <input type="text" placeholder="Cari ..." class="py-1.5 px-20 w-full bg-gray-50 rounded-md">
                        <svg class="absolute w-5 h-5 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </li>
            <li>
                <div class="flex items-center w-56 h-full justify-evenly">
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
                    <div class="flex items-center px-3 py-1 shadow-sm justify-evenly rounded-2xl bg-gray-50">
                        <div class="flex flex-col items-end h-full mr-2">
                            <h6 class="text-sm font-semibold">
                                {{ Auth::user()->applicantdata->full_name ?? '' }}</h6>
                            <span class="text-xs">Pelamar</span>
                        </div>
                        @if (Auth::user()->applicantdata->photo ?? '')
                            <img class="rounded-full"
                                src="{{ asset('storage/' . Auth::user()->applicantdata->photo) }}"
                                width="35px" srcset="">
                        @else
                            <img class="rounded-full" src="/storage/images/applicant/default.jpg" width="35px"
                                srcset="">
                        @endif
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header> --}}
{{--
<header>
    <nav class="w-full px-12 py-6">
        <ul class="flex items-center justify-between w-full h-full text-gray-600">
            <li>
                <h2 class="text-3xl font-semibold">{{$title}}</h2>
            </li>
            <li>
                <div class="relative">
                    <input type="text" placeholder="Cari ..." class="py-1.5 px-32 w-full bg-gray-50 rounded-xl">
                    <svg class="absolute w-5 h-5 top-2 left-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </li>
            <li>
                <div class="flex items-center justify-between w-56 h-full">
                    <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <div class="flex flex-row items-center px-3 py-1 shadow-sm justify-evenly rounded-2xl bg-gray-50">
                        <div class="flex flex-col items-end h-full mr-2">
                            <h6 class="text-sm font-semibold">
                             {{$profile}}</h6>
                            <span class="text-xs">Pelamar</span>
                        </div>
                        <img class="rounded-full" src="/img/applicant/user.jpg" width="35px" srcset="">
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header> --}}

    <nav class="w-full py-3">
        <ul class="flex items-center justify-between w-full text-gray-600">
            <li>
                <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">{{ $title }}</h2>
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
                                {{ Auth::user()->username ?? '' }}</h6>
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
{{--
<header>
    <nav class="w-full px-12 py-6">
        <ul class="flex items-center justify-between w-full h-full text-gray-600">
            <li>
                <h2 class="text-3xl font-semibold">{{$title}}</h2>
            </li>
            <li>
                <div class="relative">
                    <input type="text" placeholder="Cari ..." class="py-1.5 px-32 w-full bg-gray-50 rounded-xl">
                    <svg class="absolute w-5 h-5 top-2 left-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </li>
            <li>
                <div class="flex items-center justify-between w-56 h-full">
                    <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <div class="flex flex-row items-center px-3 py-1 shadow-sm justify-evenly rounded-2xl bg-gray-50">
                        <div class="flex flex-col items-end h-full mr-2">
                            <h6 class="text-sm font-semibold">
                             {{$profile}}</h6>
                            <span class="text-xs">Pelamar</span>
                        </div>
                        <img class="rounded-full" src="/img/applicant/user.jpg" width="35px" srcset="">
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header> --}}
