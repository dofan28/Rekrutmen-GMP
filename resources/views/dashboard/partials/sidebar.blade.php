    <div
        class="flex flex-col bg-blue-800 w-full px-4 py-8 overflow-y-auto border-b lg:border-r lg:h-screen lg:w-64 pt-24">

        <div class="flex flex-col justify-between mt-6 h-full">
            <aside>
                <ul>
                    @if (Auth::user()->role == 'applicant')
                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                            class="flex items-center px-3 py-2 mt-5  hover:text-blue-800 hover:bg-gray-50 hover:border-l-4 hover:border-yellow-500 {{ request()->is('applicant/application*') ? 'bg-gray-50 text-blue-800 border-l-4 border-yellow-500' : 'text-gray-100' }}"
                                href="/applicant/application">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                :fill="isHovered ? '#1e40af' : ({{ json_encode(request()->is('applicant/application*')) }} ? '#1e40af' : '#f9fafb')" viewBox="0 -960 960 960">
                                    <path
                                        d="M200-200h560v-367L567-760H200v560Zm-80 80v-720h480l240 240v480H120Zm160-160h400v-80H280v80Zm0-160h400v-80H280v80Zm0-160h280v-80H280v80Zm-80 400v-560 560Z" />
                                </svg>
                                <span class="mx-4 font-semibold font-montserrat">Lamaran Saya</span>
                            </a>
                        </li>


                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                            class="flex items-center px-3 py-2 mt-5  hover:text-blue-800 hover:bg-gray-50 hover:border-l-4 hover:border-yellow-500 {{ request()->is('applicant/jobs*') ? 'bg-gray-50 text-blue-800 border-l-4 border-yellow-500' : 'text-gray-100' }}"
                                href="/applicant/jobs">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                :fill="isHovered ? '#1e40af' : ({{ json_encode(request()->is('applicant/jobs*')) }} ? '#1e40af' : '#f9fafb')" viewBox="0 -960 960 960">
                                    <path
                                        d="M80-120v-600h240v-160h320v160h240v600H80Zm80-80h640v-440H160v440Zm240-520h160v-80H400v80ZM160-200v-440 440Z" />
                                </svg>

                                <span class="mx-4 font-semibold font-montserrat">Lowongan Kerja</span>
                            </a>
                        </li>
                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="flex items-center px-3 py-2 mt-5  hover:text-blue-800 hover:bg-gray-50 hover:border-l-4 hover:border-yellow-500 {{ request()->is('applicant/profile/*') ? 'bg-gray-50 text-blue-800 border-l-4 border-yellow-500' : 'text-gray-100' }}"
                               href="/applicant/profile/applicantdata">


                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                :fill="isHovered ? '#1e40af' : ({{ json_encode(request()->is('applicant/profile/*')) }} ? '#1e40af' : '#f9fafb')" viewBox="0 -960 960 960">  viewBox="0 -960 960 960" >
                                    <path
                                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                </svg>
                                <span class="mx-4 font-semibold font-montserrat">Profil Saya</span>
                            </a>
                        </li>
                    @elseif(Auth::user()->role == 'hrd')
                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="flex items-center px-3 py-2 text-gray-100 bg-gray-50 " href="/hrd/applications">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                    :fill="isHovered ? '#1e40af' : '#f9fafb'" viewBox="0 -960 960 960">
                                    <path
                                        d="M200-200h560v-367L567-760H200v560Zm-80 80v-720h480l240 240v480H120Zm160-160h400v-80H280v80Zm0-160h400v-80H280v80Zm0-160h280v-80H280v80Zm-80 400v-560 560Z" />
                                </svg>
                                <span class="mx-4 font-semibold font-montserrat">Mengelola Lamaran</span>
                            </a>
                        </li>

                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="flex items-center px-4 py-2 mt-5 text-gray-100 hover:text-gray-800 hover:bg-gray-100"
                                href="/hrd/jobs">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                    :fill="isHovered ? '#1e40af' : '#f9fafb'" viewBox="0 -960 960 960">
                                    <path
                                        d="M80-120v-600h240v-160h320v160h240v600H80Zm80-80h640v-440H160v440Zm240-520h160v-80H400v80ZM160-200v-440 440Z" />
                                </svg>

                                <span class="mx-4 font-semibold font-montserrat">Mengelola Lowongan</span>
                            </a>
                        </li>
                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="flex items-center px-4 py-2 mt-5 text-gray-100 hover:text-gray-800 hover:bg-gray-100"
                                href="/hrd/profile">


                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                    :fill="isHovered ? '#1e40af' : '#f9fafb'" viewBox="0 -960 960 960">
                                    <path
                                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                </svg>
                                <span class="mx-4 font-semibold font-montserrat">Profil Saya</span>
                            </a>
                        </li>
                    @elseif (Auth::user()->role == 'admin')
                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 " href="/admin/dashboard">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                    :fill="isHovered ? '#1e40af' : '#f9fafb'" viewBox="0 -960 960 960">
                                    <path
                                        d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z" />
                                </svg>
                                <span class="mx-4 font-semibold font-montserrat">Dashboard</span>
                            </a>
                        </li>
                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="flex items-center px-4 py-2 mt-5 text-gray-100 hover:text-gray-800 hover:bg-gray-100"
                                href="/admin/jobs">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                    :fill="isHovered ? '#1e40af' : '#f9fafb'" viewBox="0 -960 960 960">
                                    <path
                                        d="M80-120v-600h240v-160h320v160h240v600H80Zm80-80h640v-440H160v440Zm240-520h160v-80H400v80ZM160-200v-440 440Z" />
                                </svg>

                                <span class="mx-4 font-semibold font-montserrat">Data Lowongan</span>
                            </a>
                        </li>
                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="flex items-center px-4 py-2 mt-5 text-gray-100 hover:text-gray-800 hover:bg-gray-100"
                                href="/admin/applicants">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                    :fill="isHovered ? '#1e40af' : '#f9fafb'" viewBox="0 -960 960 960">
                                    <path
                                        d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z" />
                                </svg>

                                <span class="mx-4 font-semibold font-montserrat">Data Pelamar</span>
                            </a>
                        </li>
                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="flex items-center px-4 py-2 mt-5 text-gray-100 hover:text-gray-800 hover:bg-gray-100"
                                href="/admin/applications">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                    :fill="isHovered ? '#1e40af' : '#f9fafb'" viewBox="0 -960 960 960">
                                    <path
                                        d="M200-200h560v-367L567-760H200v560Zm-80 80v-720h480l240 240v480H120Zm160-160h400v-80H280v80Zm0-160h400v-80H280v80Zm0-160h280v-80H280v80Zm-80 400v-560 560Z" />
                                </svg>
                                <span class="mx-4 font-semibold font-montserrat">Data Lamaran</span>
                            </a>
                        </li>
                        <li x-data="{ isHovered: false }">
                            <a wire:navigate @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="flex items-center px-4 py-2 mt-5 text-gray-100 hover:text-gray-800 hover:bg-gray-100"
                                href="/admin/hrds">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                    :fill="isHovered ? '#1e40af' : '#f9fafb'" viewBox="0 -960 960 960">
                                    <path
                                        d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z" />
                                </svg>
                                <span class="mx-4 font-semibold font-montserrat">Data HRD</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </aside>
            <div>
                <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                    class="flex items-center px-3 py-2 text-gray-100 hover:text-blue-800 hover:bg-gray-50 hover:border-l-4 border-yellow-500"
                    href="logout">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" :fill="isHovered ? '#1e40af' : '#f9fafb'"
                        viewBox="0 -960 960 960">
                        <path
                            d="M120-120v-720h360v80H200v560h280v80H120Zm520-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                    </svg>
                    <span class="mx-4 font-semibold font-montserrat">Keluar</span>
                </a>
            </div>
        </div>
    </div>
