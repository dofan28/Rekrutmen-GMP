{{-- <aside class="basis-1/12 relative  rounded-r-3xl overflow-hidden text-slate-200">
    <nav class="w-full h-full bg-blue-600 flex flex-col justify-between items-center py-10">
        <a wire:navigate href="/">
            <div class="sm:pb-4 lg:pb-0">Logo GMP</div>
        </a>
        <ul class="w-full text-center text-xs basis-3/5 flex flex-col justify-evenly sm:flex-row lg:flex-col">
            <li>
                <a wire:navigate href="/hrd/applications"><svg class="w-full" width="36px" height="36px" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                stroke="#ffffff" stroke-width="0.72"></path>
                            <path d="M8 10H16" stroke="#ffffff" stroke-width="0.72" stroke-linecap="round"></path>
                            <path d="M8 14H13" stroke="#ffffff" stroke-width="0.72" stroke-linecap="round"></path>
                        </g>
                    </svg>
                    <?php
                    
                    // kode dibawah dipake buat notif jika ada pelamar mengajukan lamaran maka akan muncul notif icon berikut
                    // $idHRD = Auth::guard('hrd')->user()->id;
                    // $activeApplication = DB::table('applications')
                    //     ->join('jobs', 'applications.job_id', '=', 'jobs.id')
                    //     ->where('applications.status', '=', -1)
                    //     ->where('jobs.hrd_id', '=', $idHRD)
                    //     ->first();
                    //
                    ?>
                    <span >Mengelolah <br>Lamaran</span></a>
            </li>
            <li><a href="/hrd/jobs"><svg class="w-full" width="36px" height="36px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M9 7H5C3.89543 7 3 7.89543 3 9V18C3 19.1046 3.89543 20 5 20H19C20.1046 20 21 19.1046 21 18V9C21 7.89543 20.1046 7 19 7H15M9 7V5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7M9 7H15"
                                stroke="#ffffff" stroke-width="0.8399999999999999" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span >Mengelolah <br>Lowongan</span>
                </a>
            </li>
            <li><a href="/hrd/profile"><svg class="w-full" width="36px" height="36px" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z"
                                stroke="#ffffff" stroke-width="0.72" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z"
                                stroke="#ffffff" stroke-width="0.72" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                stroke="#ffffff" stroke-width="0.72" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    <span >Profil saya</span>
                </a></li>
        </ul>
        <div class="pt-4 lg:pt-0 text-xs">
            <form action="/logout" method="post">
                @csrf
                <button>
                    <svg class="w-full" width="36px" height="36px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.2429 22 18.8286 22 16.0002 22H15.0002C12.1718 22 10.7576 22 9.87889 21.1213C9.11051 20.3529 9.01406 19.175 9.00195 17"
                                stroke="#ffffff" stroke-width="0.72" stroke-linecap="round"></path>
                            <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15" stroke="#ffffff" stroke-width="0.72"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span >Keluar</span>
                </button>
            </form>
        </div>
    </nav>
</aside> --}}

<aside class="relative overflow-hidden text-slate-200 pb-28 lg:pb-0">
    <nav
        class="fixed w-full lg:h-full lg:w-40 rounded-b-3xl lg:rounded-bl-none lg:rounded-r-3xl bg-blue-600  flex lg:flex-col lg:justify-between lg:items-center justify-between items-center py-4 px-4 lg:px-0 lg:py-0">
        <a wire:navigate href="/"><img src="/img/logo.png" alt="PT. Graha Mutu Persada" srcset="" width="70px"
                height="30px" class="lg:mt-8 ">
        </a>
        <ul class="flex flex-row text-center text-xs font-medium lg:flex-col">
            <li
                class="px-4 py-2 hover:bg-white  stroke-white hover:stroke-blue-600 hover:text-blue-600 hover:rounded-md">
                <a wire:navigate href="/hrd/applications"><svg class="w-full " width="38px" height="38px"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                stroke-width="1.5"></path>
                            <path d="M8 10H16" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M8 14H13" stroke-width="1.5" stroke-linecap="round"></path>
                        </g>
                    </svg>
                    <?php
                    // kode dibawah dipake buat notif jika ada pelamar mengajukan lamaran maka akan muncul notif icon berikut
                    // $idHRD = Auth::guard('hrd')->user()->id;
                    // $activeApplication = DB::table('applications')
                    //     ->join('jobs', 'applications.job_id', '=', 'jobs.id')
                    //     ->where('applications.status', '=', -1)
                    //     ->where('jobs.hrd_id', '=', $idHRD)
                    //     ->first();
                    //
                    ?>
                    <span>Mengelolah <br>Lamaran</span></a>
            </li>
            <li
                class="px-4 py-2 hover:bg-white lg:my-8 md:mx-5 lg:mx-0 stroke-white hover:stroke-blue-600 hover:text-blue-600 hover:rounded-md">
                <a wire:navigate href="/hrd/jobs"><svg class="w-full" width="38px" height="38px" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M9 7H5C3.89543 7 3 7.89543 3 9V18C3 19.1046 3.89543 20 5 20H19C20.1046 20 21 19.1046 21 18V9C21 7.89543 20.1046 7 19 7H15M9 7V5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7M9 7H15"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span>Mengelolah <br>Lowongan</span>
                </a>
            </li>
            <li
                class="px-4 py-2 hover:bg-white stroke-white hover:stroke-blue-600 hover:text-blue-600 hover:rounded-md">
                <a wire:navigate href="/hrd/profile"><svg class="w-full" width="38px" height="38px"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    <span>Profil saya</span>
                </a>
            </li>
        </ul>
        <div class=" text-xs">
            <form action="/logout" method="post">
                @csrf
                <button
                    class="px-4 py-2 lg:mb-6 hover:bg-white  stroke-white hover:stroke-blue-600 hover:text-blue-600 hover:rounded-md">
                    <svg class="w-full" width="38px" height="38px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.2429 22 18.8286 22 16.0002 22H15.0002C12.1718 22 10.7576 22 9.87889 21.1213C9.11051 20.3529 9.01406 19.175 9.00195 17"
                                stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </nav>
</aside>
