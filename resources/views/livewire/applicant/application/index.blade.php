{{-- <div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Lamaran Saya</h2>
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

    @if (session()->has('success'))
        <p id="alert" class="px-6 py-4 rounded-lg text-success-700 bg-success-200">{{ session('success') }}</p>
        <script>
            // Menghilangkan alert setelah 3 detik
            setTimeout(function() {
                var alert = document.getElementById('alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif

    @if ($applications->where('deleted_at', null)->isEmpty())
        <div class="flex flex-col items-center justify-center mt-10">
            <div class="mt-24 text-gray-600">
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Lamaran anda belum tersedia</h1>
                <h3 class="text-lg text-center lg:text-xl">Anda belum pernah mengajukan lamaran sama sekali</h3>
            </div>
            @if ($jobs->where('deleted_at', null)->isEmpty())
            @else
                <div class="w-11/12 text-gray-600">
                    <div class="relative overflow-hidden overflow-x-scroll">
                        <div class="flex transition-transform slider ">
                            @foreach ($jobs as $job)
                                <div wire:key="{{ $job->id }}"
                                    class="flex flex-col justify-between flex-shrink-0 w-full mx-4 my-6 transition duration-200 ease-in-out delay-150 rounded-lg shadow-md hover:-translate-y-1 hover:scale-110 lg:w-1/4 md:w-2/4 bg-slate-200 p-7">
                                    <h4 class="text-xl font-semibold text-center text-gray-800 ">
                                        {{ $job->jobcompany->name }}
                                    </h4>
                                    <h4 class="text-xl font-semibold text-center text-gray-800 "> {{ $job->position }}
                                    </h4>
                                    <p class="mt-4 text-base text-justify text-gray-600">{{ $job->jobcompany->address }}
                                    </p>
                                    <p class="mt-2 text-base text-justify text-gray-600">{{ $job->jobdesk }}</p>
                                    <div class="flex justify-center">
                                        <a wire:navigate href="/applicant/jobs/{{ $job->id }}"><button
                                                class="font-semibold text-gray-800 underline hover:text-blue-600">
                                                Selengkapnya...
                                            </button></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endif

        </div>
    @else
        <div class="mx-4 mt-4 lg:mt-10 lg:mx-10">
            <table class="w-full">
                <thead class="bg-gray-200 rounded-md">
                    <tr class="text-center text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Perusahaan</th>
                        <th class="px-4 py-3">Posisi</th>
                        <th class="px-4 py-3">Detail</th>
                        <th class="px-4 py-3">Lampiran</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Konfirmasi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($applications as $application)
                        <tr>
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-center">{{ $application->job->jobcompany->name }}</td>
                            <td class="px-4 py-3 text-center">{{ $application->job->position }}</td>
                            <td class="px-4 py-3 text-center"><a wire:navigate
                                    href="/applicant/application/{{ $application->id }}/show"
                                    class="text-center text-blue-500 underline">Lihat Detail</a></button></td>
                            <td class="px-4 py-3 text-center"><a wire:navigate
                                    href="/applicant/application/applicationletter/{{ $application->id }}"
                                    class="text-center text-blue-500 underline">Surat Lamaran</a></td>
                            <td class="px-4 py-3 text-center">
                                @if ($application->status == -1)
                                    Menunggu
                                @elseif ($application->status == 0)
                                    Ditolak
                                @elseif ($application->status == 1)
                                    <a wire:navigate
                                        href="/applicant/application/applicationletter/{{ $application->id }}"
                                        class="text-center text-blue-500 underline">Diterima</a>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if ($application->confirm == 0 && $application->status > -1)

                                    <button type="submit" wire:click="confirm({{ $application->id }})"
                                        wire:confirm="Anda yakin?"
                                        class="px-2 py-1 text-center bg-blue-500 rounded text-gray-50 hover:bg-blue-700">Konfirmasi</button>
                                @elseif ($application->status == -1)
                                    <button class="px-2 py-1 text-center bg-gray-400 rounded text-gray-50"
                                        disabled>Konfirmasi</button>
                                @elseif ($application->confirm == 1)
                                    <i class="fa fa-check-circle"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif
</div> --}}
<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl font-bold tracking-wide text-gray-800 font-montserrat">Lamaran Saya</h2>
    </div>
    @if (session()->has('success'))
        <x-alert type='success' :message="session('success')"></x-alert>
    @endif
    @forelse ($applications as $application)
        <div class="w-full py-6 mt-4 bg-gray-100">
            <div class="px-5 pb-5">
                <div>
                    <a href="/jobs/{{ $application->job->id }}"
                        class="text-2xl font-semibold tracking-wide text-blue-800 uppercase font-montserrat hover:underline hover:text-blue-900 ">{{ $application->job->position }}
                    </a>
                    <p class="text-base text-gray-800 font-poppins">{{ $application->job->jobcompany->name }}</p>
                    <p class="text-sm text-gray-800 font-poppins">Tanggal Melamar: {{ $application->created_at }}</p>
                </div>
                <a wire:navigate href="/applicant/application/applicationletter/{{ $application->id }}"
                    class="inline-flex my-2 overflow-hidden bg-blue-800 hover:bg-blue-900 text-gray-50 group">
                    <span
                        class="px-3.5 py-1 text-gray-50 bg-white group-hover:bg-blue-100 flex items-center justify-center">
                        <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                            <path
                                d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                        </svg>
                    </span>
                    <span class="py-1 pl-4 pr-5 font-semibold">Surat Lamaran</span>
                </a>
            </div>
            <div class="flex">
                <div class="w-1/3">
                    <div class="relative mb-2">
                        <div class="flex items-center w-10 h-10 mx-auto text-lg bg-green-600 text-gray-50">
                            <span class="w-full text-center text-gray-50">
                                <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M240-160q-33 0-56.5-23.5T160-240q0-33 23.5-56.5T240-320q33 0 56.5 23.5T320-240q0 33-23.5 56.5T240-160Zm0-240q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm0-240q-33 0-56.5-23.5T160-720q0-33 23.5-56.5T240-800q33 0 56.5 23.5T320-720q0 33-23.5 56.5T240-640Zm240 0q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Zm240 0q-33 0-56.5-23.5T640-720q0-33 23.5-56.5T720-800q33 0 56.5 23.5T800-720q0 33-23.5 56.5T720-640ZM480-400q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm40 240v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="text-xs text-center md:text-base font-poppins">
                        <h3>Daftar & Lamar Lowongan Kerja</h3>
                        <h4 class="inline-block px-3 py-1 font-semibold text-green-600 border-2 border-green-600">
                            SELESAI
                        </h4>
                    </div>
                </div>

                <div class="w-1/3">
                    <div class="relative mb-2">
                        <div class="absolute flex items-center content-center align-middle align-center"
                            style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="items-center flex-1 w-full align-middle bg-gray-200 rounded align-center">
                                <div class="w-0 py-1 bg-green-300 rounded" style="width: 100%;"></div>
                            </div>
                        </div>

                        <div class="flex items-center w-10 h-10 mx-auto text-lg bg-green-600 text-gray-50">
                            <span class="w-full text-center text-gray-50">
                                <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M440-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-80q33 0 56.5-23.5T520-640q0-33-23.5-56.5T440-720q-33 0-56.5 23.5T360-640q0 33 23.5 56.5T440-560ZM884-20 756-148q-21 12-45 20t-51 8q-75 0-127.5-52.5T480-300q0-75 52.5-127.5T660-480q75 0 127.5 52.5T840-300q0 27-8 51t-20 45L940-76l-56 56ZM660-200q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-540 40v-111q0-34 17-63t47-44q51-26 115-44t142-18q-12 18-20.5 38.5T407-359q-60 5-107 20.5T221-306q-10 5-15.5 14.5T200-271v31h207q5 22 13.5 42t20.5 38H120Zm320-480Zm-33 400Z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="text-xs text-center md:text-base font-poppins">
                        <h3>Seleksi Lamaran & Administrasi</h3>
                        @if ($application->status == -1)
                            <h4 class="inline-block px-3 py-1 font-semibold text-yellow-600 border-2 border-yellow-600">
                                MENUNGGU
                            </h4>
                        @elseif ($application->status == 1 || $application->status == 0)
                            <h4 class="inline-block px-3 py-1 font-semibold text-green-600 border-2 border-green-600">
                                SELESAI
                            </h4>
                        @endif
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="relative mb-2">
                        <div class="absolute flex items-center content-center align-middle align-center"
                            style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="items-center flex-1 w-full align-middle bg-gray-200 rounded align-center">
                                <div class="w-0 py-1 bg-green-300 rounded"
                                    @if ($application->status == -1) style="width: 10%;"
                                    @elseif ($application->status == 0 || $application->status == 1)
                                    style="width: 100%;" @endif>
                                </div>
                            </div>
                        </div>
                        @if ($application->status == -1)
                            <div
                                class="flex items-center w-10 h-10 mx-auto text-lg bg-white border-2 border-gray-200 text-gray-50">
                                <svg class="w-full text-center fill-gray-800" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M482-160q-134 0-228-93t-94-227v-7l-64 64-56-56 160-160 160 160-56 56-64-64v7q0 100 70.5 170T482-240q26 0 51-6t49-18l60 60q-38 22-78 33t-82 11Zm278-161L600-481l56-56 64 64v-7q0-100-70.5-170T478-720q-26 0-51 6t-49 18l-60-60q38-22 78-33t82-11q134 0 228 93t94 227v7l64-64 56 56-160 160Z" />
                                </svg>
                            </div>
                        @elseif ($application->status == 0)
                            <div
                                class="flex items-center w-10 h-10 mx-auto text-lg bg-red-600 border-2 border-gray-200 text-gray-50">
                                <svg class="w-full text-center fill-gray-50" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                </svg>
                            </div>
                        @elseif ($application->status == 1)
                            <div
                                class="flex items-center w-10 h-10 mx-auto text-lg bg-green-600 border-2 border-gray-200 text-gray-50">
                                <svg class="w-full text-center fill-gray-50" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="text-xs text-center md:text-base font-poppins">
                        <h3>Hasil Status Seleksi</h3>
                        @if ($application->status == 0)
                            <a wire:navigate href="/applicant/application/companyreply/{{ $application->id }}"
                                x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="inline-block px-3 py-1 font-semibold text-red-600 border-2 border-red-600 hover:text-red-50 hover:bg-red-600">
                                <svg class="inline-block h-7 w-7" :class="isHovered ? 'fill-gray-50' : 'fill-red-600'"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                    <path
                                        d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                                </svg>
                                <span>
                                    DITOLAK
                                </span>
                            </a>
                        @elseif ($application->status == 1)
                            <a wire:navigate href="/applicant/application/companyreply/{{ $application->id }}"
                                x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                class="inline-block px-3 py-1 font-semibold text-green-600 border-2 border-green-600 hover:text-green-50 hover:bg-green-600">
                                <svg class="inline-block h-7 w-7" :class="isHovered ? 'fill-gray-50' : 'fill-green-600'"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                    <path
                                        d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                                </svg>
                                <span>
                                    LOLOS
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    @empty
        @if (!auth()->user()->applicantdata || !auth()->user()->contact)
            <div class="w-full p-20 mt-4 text-center">
                <h3 class="text-3xl font-poppins font-semibold tracking-wide text-gray-800">Terima kasih atas minat Anda
                    bergabung dalam <br> program <span class="text-red-600">Rekrutmen</span> <span
                        class="text-blue-600">PT. Graha Mutu Persada</span> </h3>
                <p class="text-gray-800 font-medium mt-3"> Sebelum melamar lowongan kerja <a href="/applicant/jobs"
                        class="text-blue-600 hover:text-blue-700 hover:underline">disini</a> , Silakan isi data pribadi
                    dan kontak, serta data pendukung lainnya, Pastikan data yang Anda isi benar & lengkap, Karena data
                    tersebut penting dalam proses seleksi lamaran.</p>
            </div>
        @else
            <div class="w-full p-20 mt-4 text-center">
                <h3 class="text-3xl font-poppins font-semibold tracking-wide text-gray-800">Tidak ada lamaran yang
                    tersedia.</h3>
                <p class="text-gray-800 font-medium mt-3"> Jika anda ingin melamar lowongan kerja? <a
                        href="/applicant/jobs" class="text-blue-600 hover:text-blue-700 hover:underline">disini</a> ,
                    Pastikan data yang Anda isi benar & lengkap, Karena data tersebut penting dalam proses seleksi
                    lamaran.</p>
            </div>
        @endif
    @endforelse
</div>
