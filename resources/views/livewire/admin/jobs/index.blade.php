{{-- <div>
    <header>
        <nav class="w-full pt-14 lg:py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Data Lowongan</h2>
                </li>
                <li class="justify-center hidden w-full md:flex">
                    <div class="flex items-center py-1.5 px-2 w-2/3 bg-slate-200 rounded-xl">
                        <input wire:model.live="search" type="text" placeholder="Cari ..." class="w-full ml-2 outline-none bg-slate-200">
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
            <div class="flex justify-center m-4 md:hidden">
                <div class="flex items-center py-1.5 px-2 w-full sm:w-2/3 bg-slate-200 rounded-xl ">
                    <input wire:model.live="search" type="text" placeholder="Cari ..." class="w-full ml-2 outline-none bg-slate-200">
                    <svg class="" width="24px" height="24px" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </nav>
    </header>
    <div class="mx-4 lg:ml-8">
        <div>
            <a wire:navigate href="/admin/jobcompanies">
                <button type="submit"
                    class="px-4 py-2 mb-6 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-800">
                    Data Perusahaan</button>
            </a>
            <a wire:navigate href="/admin/jobeducations">
                <button type="submit"
                    class="px-4 py-2 mb-6 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-800">
                    Data Pendidikan</button>
            </a>
        </div>
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
        @if ($jobs->where('deleted_at', null)->isEmpty())
            <div class="mt-24 text-gray-600">
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Data lowongan pekerjaan tidak tersedia.</h1>
            </div>
        @else
            <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                <thead class="border-b border-gray-200 bg-gray-50">
                    <tr class="text-left text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Posisi</th>
                        <th class="px-4 py-3">Perusahaan</th>
                        <th class="px-4 py-3">Pendidikan</th>
                        <th class="px-4 py-3">Status Publikasi</th>
                        <th class="px-4 py-3">Detail</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($jobs as $job)
                    <div wire:key="{{ $job->id }}">
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $job->position }}</td>
                            <td class="px-4 py-3">{{ $job->jobcompany->name }}</td>
                            <td class="px-4 py-3">{{ $job->jobeducation->name }}</td>
                            <td class="px-4 py-3">
                                @if ($job->status === -1)
                                    <p class="font-semibold text-yellow-600 underline">
                                        Menunggu
                                    </p>
                                @elseif ($job->status === 0)
                                    <p class="font-semibold text-red-600 underline">
                                        Tidak Dipublikasi
                                    </p>
                                @elseif ($job->status === 1)
                                    <p class="font-semibold text-green-600 underline">
                                        Dipublikasi
                                    </p>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <a wire:navigate href="/admin/jobs/{{ $job->id }}"
                                    class="px-2 py-1 text-white bg-blue-600 rounded hover:bg-blue-700">Detail</a>
                            </td>
                            <td class="px-4 py-3">
                                <button type="submit" wire:click="delete({{ $job->id }})" wire:confirm="Anda yakin?" class="inline-block px-2 py-1 text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                            </td>
                        </tr>
                    </div>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


</div> --}}

<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Data Lowongan</h2>
    </div>

    <div class="border border border-blue-200 mt-4 w-full">
        <table class="w-full border-collapse bg-white text-left text-gray-800">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Posisi</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Perusahaan</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Min. Pendidikan</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Status Publikasi</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100 font-poppins">
                @forelse ($jobs as $job)
                    <tr wire:key='{{ $job->id }}' class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm">{{ $job->position }}</td>
                        <td class="px-6 py-4 text-sm">{{ $job->jobcompany->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $job->jobeducation->name }}</td>

                        {{-- <td class="px-6 py-4 text-sm ">
                            <div class="flex lg:flex-row md:flex-row sm:flex-col justify-start  items-center gap-1">
                                <span>{{ $application->job->position }}</span>
                                <a wire:navigate href="/admin/applications/job/{{ $application->job->id }}"
                                    x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                    href="#" class="relative">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-7 w-7 p-1 hover:bg-gray-200 hover:text-blue-600"
                                        viewBox="0 -960 960 960" :fill="isHovered ? '#1e40af' : '#1f2937'">
                                        <path
                                            d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                    </svg>

                                    <div x-show="isHovered" class="absolute bg-gray-800 text-white p-1 mt-1 text-sm">
                                        Detail
                                    </div>
                                </a>
                            </div>

                        </td> --}}
                        <td class="px-6 py-4 text-sm ">
                            <div class="flex lg:flex-row md:flex-row sm:flex-col justify-start  items-center gap-1">
                                @if ($job->status === -1)
                                    <p class="font-semibold text-yellow-600 underline">
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-yellow-50 px-2 py-1 text-xs font-semibold text-yellow-600">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                                class="h-4 w-4">
                                                <path
                                                    d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"
                                                    fill='#ca8a04' />
                                            </svg>
                                            Menunggu
                                        </span>
                                    </p>
                                @elseif ($job->status === 0)
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                            class="h-4 w-4">
                                            <path
                                                d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"
                                                fill='#dc2626' />
                                        </svg>
                                        Tidak Dipublikasi
                                    </span>
                                @elseif ($job->status === 1)
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                            class="h-4 w-4">
                                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"
                                                fill='#16a34a' />
                                        </svg>
                                        Dipublikasi
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex lg:flex-row md:flex-row sm:flex-col justify-start gap-3">
                                <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                    href="/admin/jobs/{{ $job->id }}" class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                        class="h-8 w-8 p-1 hover:bg-gray-200 hover:text-blue-600"
                                        :fill="isHovered ? '#1e40af' : '#1f2937'">
                                        <path
                                            d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                    </svg>
                                    <div x-show="isHovered" class="absolute bg-gray-800 text-white p-1 mt-1 text-sm">
                                        Detail
                                    </div>
                                </a>
                                <button wire:click="delete({{ $job->id }})" wire:confirm="Anda yakin?"
                                    href="#" x-data="{ isHovered: false }" @mouseover="isHovered = true"
                                    @mouseout="isHovered = false" class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                        class="h-8 w-8 p-1 hover:bg-gray-200 hover:text-blue-600"
                                        :fill="isHovered ? '#1e40af' : '#1f2937'">
                                        <path
                                            d="M200-120v-600h-40v-80h200v-40h240v40h200v80h-40v600H200Zm80-80h400v-520H280v520Zm80-80h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                    </svg>
                                    <div x-show="isHovered" class="absolute bg-gray-800 text-white p-1 mt-1 text-sm">
                                        Hapus
                                    </div>
                                </button>
                            </div>
                        </td>

                    </tr>
                @empty
                    <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Data lamaran tidak tersedia.</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
