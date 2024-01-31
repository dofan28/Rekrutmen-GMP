{{-- <div>

    <div class="mx-4 lg:mx-10">
        <a wire:navigate href="/hrd/jobs/create" class="">
            <button type="submit"
                class="top-0 right-0 px-4 py-2 mb-4 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Publikasi
                Lowongan</button>
        </a>
        @if ($hrd->hrddata->is_recruitment_staff)
            <a wire:navigate href="/hrd/jobs/publish-manage" class="">
                <button type="submit"
                    class="top-0 right-0 px-4 py-2 mb-6 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Mengelolah
                    Pengajuan Publikasi Lowongan</button>
            </a>
        @endif
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
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Lowongan pekerjaan tidak tersedia.</h1>
            </div>
        @else
            <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                <thead class="bg-gray-200 border-b border-gray-200">
                    <tr class="text-center text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Posisi</th>
                        <th class="px-4 py-3">Perusahaan</th>
                        <th class="px-4 py-3">Pendidikan</th>
                        <th class="px-4 py-3">Detail</th>
                        <th class="px-4 py-3">Status Publikasi</th>
                        @if (!$hrd->hrddata->is_recruitment_staff)
                            <th class="px-4 py-3">Status Pengajuan</th>
                        @endif
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($jobs as $job)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $job->position }}</td>
                            <td class="px-4 py-3">{{ $job->jobcompany->name }}</td>
                            <td class="px-4 py-3">{{ $job->jobeducation->name }}</td>
                            <td class="px-4 py-3 font-medium text-center"><a wire:navigate
                                    href="/hrd/jobs/detail/{{ $job->id }}"
                                    class="text-blue-600 hover:underline">Lihat Detail</a></td>
                            <td class="px-4 py-3 text-center">
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
                            @if (!$hrd->hrddata->is_recruitment_staff)
                                <td class="text-center px-4 py-3">
                                    @if ($job->confirm === null)
                                        <p class="font-semibold text-yellow-600 underline">
                                            Menunggu
                                        </p>
                                    @elseif ($job->status === 0)
                                        <p class="font-semibold text-red-600 underline">
                                            Tidak Disetujui
                                        </p>
                                    @elseif ($job->status === 1)
                                        <p class="font-semibold text-green-600 underline">
                                            Disetujui
                                        </p>
                                    @endif
                                </td>
                            @endif
                            <td class="flex flex-col gap-2 px-4 py-3 font-medium">

                                <div class="flex justify-center">
                                    @if (!$hrd->hrddata->is_recruitment_staff)
                                        @if ($job->status !== 0 && $job->confirm !== 0)
                                            <a wire:navigate href="/hrd/jobs/{{ $job->id }}/edit"
                                                class="w-full px-2 py-1 mr-2 text-center text-white bg-blue-600 rounded-md h-min hover:bg-blue-700">Ubah</a>
                                        @endif
                                    @else
                                        <a wire:navigate href=""
                                            class="w-full px-2 py-1 mr-2 text-center text-white bg-blue-600 rounded-md h-min hover:bg-blue-700">Ubah</a>
                                    @endif

                                    <button type="submit" wire:click="delete({{ $job->id }})"
                                        wire:confirm="Anda yakin?"
                                        class="px-2 py-1 text-white bg-red-600 rounded-md hover:bg-red-700">Hapus</button>

                                </div>
                                @if (!$hrd->hrddata->is_recruitment_staff)
                                    @if ($job->status == 0)
                                        @if (!$job->confirm == 0)
                                            <button type="submit" wire:click="waiting({{ $job->id }})"
                                                wire:confirm="Anda yakin?"
                                                class="px-2 py-1 text-center text-white bg-blue-600 rounded-md  hover:bg-blue-700">Buka
                                                Lowongan</button>
                                        @endif
                                    @elseif ($job->status == 1)
                                        <button type="submit" wire:click="close({{ $job->id }})"
                                            wire:confirm="Anda yakin?"
                                            class="px-2 py-1 text-center text-white bg-red-600 rounded-md  hover:bg-red-700">Tutup
                                            Lowongan</button>
                                    @endif
                                @else
                                    @if ($job->status)
                                        <button type="submit" wire:click="close({{ $job->id }})"
                                            wire:confirm="Anda yakin?"
                                            class="px-2 py-1 text-center text-white bg-red-600 rounded-md  hover:bg-red-700">Tutup
                                            Lowongan</button>
                                    @else
                                        <button type="submit" wire:click="open({{ $job->id }})"
                                            wire:confirm="Anda yakin?"
                                            class="px-2 py-1 text-center text-white bg-blue-600 rounded-md  h-min hover:bg-blue-700">Buka
                                            Lowongan</button>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div> --}}


<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Mengelola Lowongan Kerja</h2>
    </div>
    <div class="mt-4 flex justify-between">
        <a wire:navigate href="/hrd/jobs/create"
            class=" relative w-56 h-9 cursor-pointer flex items-center  bg-blue-800 group hover:bg-blue-900 active:bg-blue-900">
            <span
                class="text-white font-semibold ml-8 transform group-hover:translate-x-20 transition-all duration-300">Publikasi
                Lowongan</span>
            <span
                class="absolute right-0 h-full w-10 rounded-lg bg-blue-800 flex items-center justify-center transform group-hover:translate-x-0 group-hover:w-full transition-all duration-300">
                <svg class="svg w-8 text-white" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <line x1="12" x2="12" y1="5" y2="19"></line>
                    <line x1="5" x2="19" y1="12" y2="12"></line>
                </svg>
            </span>
        </a>
        @if ($hrd->hrddata->is_recruitment_staff)
            <a wire:navigate href="/hrd/jobs/publish-manage"
                class="group hover:bg-blue-900 relative bg-blue-800  text-neutral-50 duration-500 font-semibold flex justify-start gap-2 items-center p-2 pr-6">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-8 h-8 fill-neutral-50">
                    <path
                        d="M160-200v-15 15-440 440Zm-80 80v-600h240v-160h320v160h240v251q-18-13-38-22.5T800-508v-132H160v440h283q3 21 9 41t15 39H80Zm320-600h160v-80H400v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm0-80 120-120-28-28-72 72v-164h-40v164l-72-72-28 28 120 120Z" />
                </svg>
                <span class="border-l-2 px-1 text-sm text-justify">Mengelola Pengajuan <br> Publikasi Lowongan</span>
                <div
                    class="group-hover:opacity-100 opacity-0 top-16 absolute z-10 inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-500 bg-blue-800 rounded shadow-sm before:w-3 before:h-3 before:rotate-45 before:-top-1 before:left-20 before:bg-blue-600 before:absolute text-start">
                    Lihat lowongan kerja yang diajukan HRD lain untuk dipublikasikan!
                </div>
            </a>
        @endif
    </div>
    <div class="border border-gray-100 mt-3 w-full">
        <table class="w-full border-collapse bg-white text-left text-gray-800">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Posisi</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Perusahaan</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Pendidikan</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Status Publikasi</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100 font-poppins">
                @forelse ($jobs as $job)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm">{{ $job->position }}</td>
                        <td class="px-6 py-4 text-sm">{{ $job->jobcompany->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $job->jobeducation->name }}</td>
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
                                <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true"
                                    @mouseout="isHovered = false" href="/hrd/jobs/detail/{{ $job->id }}"
                                    class="relative">
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
                                <a wire:navigate x-data="{ isHovered: false }" @mouseover="isHovered = true"
                                    @mouseout="isHovered = false" href="/hrd/jobs/{{ $job->id }}/edit"
                                    class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                        class="h-8 w-8 p-1 hover:bg-gray-200 hover:text-blue-600"
                                        :fill="isHovered ? '#1e40af' : '#1f2937'">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l585-583 167 171-582 582H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                    </svg>
                                    <div x-show="isHovered" class="absolute bg-gray-800 text-white p-1 mt-1 text-sm">
                                        Ubah
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
