<div>
    <header>
        <nav class="w-full pt-14 lg:py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Lainnya</h2>
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
                                <span class="text-xs">Admin</span>
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
    </header>
    <div class="container p-4 mx-auto">
        <div id="card-container" class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2">

            <div class="card" data-link="/admin/others/activitylogs">
                <div
                    class="flex flex-col items-center p-4 transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105">
                    <h2 class="text-lg font-semibold">LOG AKTIVITAS</h2>
                    <i class="p-3 fa-solid fa-clock-rotate-left text-9xl"></i>
                    <a wire:navigate href="/admin/others/activitylogs"
                        class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-full hover:bg-blue-600">Lihat
                        Selengkapnya</a>
                </div>
            </div>

            <div class="card" data-link="/admin/others/recyclebin">
                <div
                    class="flex flex-col items-center p-4 transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105">
                    <h2 class="text-lg font-semibold">TEMPAT SAMPAH</h2>
                    <i class="p-3 fa-solid fa-trash-can text-9xl"></i> <a wire:navigate href="/admin/others/recyclebin"
                        class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-full hover:bg-blue-600">Lihat
                        Selengkapnya</a>
                </div>
            </div>
            {{--
            <div class="card" data-link="/admin/applications">
                <div
                    class="flex flex-col items-center p-4 transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105">
                    <h2 class="text-lg font-semibold">LAMARAN</h2>
                    <h1 class="text-3xl md:text-5xl lg:text-9xl">{{ $applications->count() }}</h1>
                    <a wire:navigate href="/admin/applications"
                        class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-full hover:bg-blue-600">Lihat
                        Selengkapnya</a>
                </div>
            </div>
            <div class="card" data-link="/admin/hrds">
                <div
                    class="flex flex-col items-center p-4 transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105">
                    <h2 class="text-lg font-semibold">HRD</h2>
                    <h1 class="text-3xl md:text-5xl lg:text-9xl">{{ $hrds->count() }}</h1>
                    <a wire:navigate href="/admin/hrds"
                        class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-full hover:bg-blue-600">Lihat
                        Selengkapnya</a>
                </div>
            </div> --}}
        </div>
    </div>
    <script>
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.addEventListener('click', () => {
                const link = card.getAttribute('data-link');
                window.location.href = link;
            });
        });
    </script>
</div>
