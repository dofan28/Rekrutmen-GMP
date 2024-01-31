{{-- <div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Pengajuan Publikasi Lowongan</h2>
                </li>
                <li class="justify-center hidden w-full md:flex">
                    <div class="flex items-center py-1.5 px-2 justify-center w-2/3 bg-slate-200 rounded-xl">
                        <input  type="text" placeholder="Cari ..." class="w-full ml-2 outline-none bg-slate-200">
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
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="flex items-center px-3 py-1 shadow-sm rounded-2xl bg-gray-50">
                            <div class="flex flex-col h-full mr-2">
                                <h6 class="text-sm font-semibold">
                                    {{ Auth::user()->username ?? '' }}</h6>
                                <span class="text-xs">HRD</span>
                            </div>
                            @if (Auth::user()->hrddata->photo != 'images/hrd/profile/default.jpg' ?? '')
                                <img class="rounded-full" src="{{ asset('storage/' . Auth::user()->hrddata->photo) }}"
                                    width="35px" srcset="">
                            @else
                                <img class="rounded-full" src="/images/hrd/profile/default.jpg" width="35px"
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
    <div class="mx-4 lg:mx-10">
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
        @if (session()->has('failed'))
            <p id="alert" class="px-6 py-4 rounded-lg text-danger-700 bg-danger-200">{{ session('success') }}</p>
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
        <a wire:navigate wire:navigate href="/hrd/jobs" class="flex items-center mb-4 w-min">
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
        @if ($jobs->where('deleted_at', null)->isEmpty())
            <div class="mt-24 text-gray-600">
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Pengajuan lowongan baru tidak tersedia.</h1>
            </div>
        @else
            <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                <thead class="bg-gray-200 border-b border-gray-200">
                    <tr class="text-center text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">HRD</th>
                        <th class="px-4 py-3">Posisi Lowongan</th>
                        <th class="px-4 py-3">Informasi HRD</th>
                        <th class="px-4 py-3">Informasi Lowongan</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($jobs as $job)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $job->hrddata->full_name }}</td>
                            <td class="px-4 py-3">{{ $job->position }}</td>
                            <td class="px-4 py-3 font-medium text-center"><a wire:navigate href="/hrd/jobs/publish-manage/hrd-info/{{ $job->hrddata->id }}"
                                    class="text-blue-600 hover:underline">Lihat Detail</a></td>
                            <td class="px-4 py-3 font-medium text-center"><a wire:navigate href="/hrd/jobs/publish-manage/job-info/{{ $job->id }}"
                                    class="text-blue-600 hover:underline">Lihat Detail</a></td>
                            <td class="px-4 py-3 text-center">
                                @if ($job->status === -1)
                                    <p class="font-semibold text-yellow-600 underline">
                                        Menunggu Konfirmasi
                                    </p>
                                @elseif ($job->status === 0)
                                    <p class="font-semibold text-red-600 underline">
                                        Tidak Aktif
                                    </p>
                                @elseif ($job->status === 1)
                                    <p class="font-semibold text-green-600 underline">
                                        Aktif
                                    </p>
                                @endif
                            </td>
                            <td class="flex justify-between py-1 px-2">
                                <div class="flex gap-1 sm:flex-col xs:flex-col sm:gap-x-1 ">
                                    @if ($job->status === -1)
                                            <button type="submit" wire:click="agree({{ $job->id }})"
                                                wire:confirm="Anda yakin?"
                                                class="flex justify-center px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700">Setuju</button>
                                            <button type="submit" wire:click="disagree({{ $job->id }})"
                                                wire:confirm="Anda yakin?"
                                                class="flex justify-center px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700">Tidak Setuju</button>
                                    @elseif ($job->status === 0)
                                        Tidak Disetujui
                                    @elseif ($job->status === 1)
                                        Disetujui
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div> --}}

{{-- paginate --}}
{{-- <div class="flex justify-center my-4">
        {{ $jobs->appends(request()->all())->links() }}
    </div> --}}
{{-- </div> --}}

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
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Mengelola Pengajuan Publikasi Lowongan Kerja</h2>
    </div>
    <a wire:navigate href="/hrd/jobs" class="mt-4 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 -960 960 960" class="w-5 h-5">
            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
        </svg>
        <span class="text-sm font-poppins">Kembali</span>
    </a>
    <div class="border border-gray-100 w-full mt-2">
        <table class="w-full border-collapse bg-white text-left text-gray-800">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">HRD</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Lowongan Kerja</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Status Publikasi</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100 font-poppins">
                @forelse ($jobs as $job)
                    <tr class="hover:bg-gray-50">
                        <th class="flex gap-3 px-6 py-4 items-center font-normal text-gray-900">
                            <div class="relative h-10 w-10">
                                <img class="h-full w-full object-cover object-center"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="" />
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">{{ $job->hrddata->hrd->username }}</div>
                                <div class="text-gray-400">{{ $job->hrddata->hrd->email }}</div>
                            </div>
                            <a wire:navigate href="/hrd/jobs/publish-manage/hrd-info/{{ $job->hrddata->id }}"
                                x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                href="#" class="relative">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-7 w-7 p-1 hover:bg-gray-200 hover:text-blue-600" viewBox="0 -960 960 960"
                                    :fill="isHovered ? '#1e40af' : '#1f2937'">
                                    <path
                                        d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                </svg>

                                <div x-show="isHovered" class="absolute bg-gray-800 text-white p-1 mt-1 text-sm">
                                    Detail
                                </div>
                            </a>
                        </th>
                        <td class="px-6 py-4 text-sm ">
                            <div class="flex lg:flex-row md:flex-row sm:flex-col justify-start  items-center gap-1">
                                <span>{{ $job->position }}</span>
                                <a wire:navigate href="/hrd/jobs/publish-manage/job-info/{{ $job->id }}"
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
                        </td>
                        <td class="px-6 py-4 text-sm">
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
                                        Menunggu Konfirmasi
                                    </span>
                                </p>
                            @elseif ($job->status === 0)
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-4 w-4">
                                        <path
                                            d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"
                                            fill='#dc2626' />
                                    </svg>
                                    Tidak Dipublikasi
                                </span>
                            @elseif ($job->status === 1)
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-4 w-4">
                                        <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"
                                            fill='#16a34a' />
                                    </svg>
                                    Dipublikasi
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm ">
                            @if ($job->status == -1)
                                <button wire:click="agree({{ $job->id }})" wire:confirm="Anda yakin?"
                                    class="inline-flex items-center px-2 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 -960 960 960" fill="#f9fafb"
                                        class="h-5 w-5 mr-2">
                                        <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                                    </svg>
                                    Setuju
                                </button>
                                <button wire:click="disagree({{ $job->id }})" wire:confirm="Anda yakin?"
                                    class="inline-flex items-center px-2 py-1.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 mr-2"
                                        fill="#f9fafb">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                                    </svg>
                                    Tidak Setuju
                                </button>
                            @elseif ($job->status == 0)
                                Tidak Disetujui
                            @elseif ($job->status == 1)
                                Disetujui
                            @endif
                        </td>
                    </tr>
                @empty
                    <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Data lamaran tidak tersedia.</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
