{{-- <div>

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
        @if ($applications->where('deleted_at', null)->isEmpty())
            <div class="mt-24 text-gray-600">
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Lamaran tidak tersedia.</h1>
            </div>
        @else
            <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                <thead class="bg-gray-200 border-b border-gray-200">
                    <tr class="text-center text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Pelamar</th>
                        <th class="px-4 py-3">Posisi Pekerjaan</th>
                        <th class="px-4 py-3">Lampiran</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($applications as $application)
                        <tr>
                            <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-center">
                                @if (isset($application->applicant->applicantdata->full_name))
                                    <a wire:navigate href="/hrd/applications/applicant/{{ $application->id }}"
                                        class="text-blue-600 hover:underline">{{ $application->applicant->applicantdata->full_name }}</a>
                                @else
                                    {{ $application->applicant->username }}
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a wire:navigate href="/hrd/applications/job/{{ $application->job->id }}"
                                    class="text-blue-600 hover:underline">{{ $application->job->position }}</a>
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if ($application->cv)
                                    <a wire:navigate href="/storage/{{ $application->cv }}"
                                        class="text-blue-600 hover:underline">CV </a>
                                @else
                                    <button class="text-danger-600" disabled>Tidak ada CV </button>
                                @endif
                                |
                                <a wire:navigate href="/hrd/applications/{{ $application->id }}"
                                    class="text-blue-600 hover:underline">
                                    Surat
                                    Lamaran </a>
                            </td>
                            <td class="flex flex-col justify-center px-4 py-3 lg:flex-row">
                                <div class="flex gap-1">
                                    @if ($application->status == -1)
                                        <a wire:navigate href="/hrd/applications/{{ $application->id }}/accept"
                                            onclick="return confirm('Anda yakin menerima lamaran?')"
                                            class="flex justify-center px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700">Terima</a>
                                        <button type="submit" wire:click="reject({{ $application->id }})"
                                            wire:confirm="Anda yakin?"
                                            class="flex justify-center px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700">Tolak</button>
                                    @elseif ($application->status == 0)
                                        Ditolak
                                    @elseif ($application->status == 1)
                                        Diterima
                                    @endif
                                </div>
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
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Mengelola Lamaran</h2>
    </div>
    <div class="overflow-auto border border-gray-100 mt-4 w-full">
        <table class="w-full border-collapse bg-white text-left text-gray-800">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Pelamar</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Lowongan Kerja</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Lampiran</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100 font-poppins">
                @forelse ($applications as $application)
                    <tr class="hover:bg-gray-50">
                        <th class="flex gap-3 px-6 py-4 items-center font-normal text-gray-900">
                            <div class="relative h-10 w-10">
                                <img class="h-full w-full object-cover object-center"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="" />
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">{{ $application->applicant->username }}</div>
                                <div class="text-gray-400">{{ $application->applicant->email }}</div>
                            </div>
                            <a wire:navigate href="/hrd/applications/applicant/{{ $application->id }}"
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
                        </th>
                        <td class="px-6 py-4 text-sm ">
                            <div class="flex lg:flex-row md:flex-row sm:flex-col justify-start  items-center gap-1">
                                <span>{{ $application->job->position }}</span>
                                <a wire:navigate href="/hrd/applications/job/{{ $application->job->id }}"
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
                            @if ($application->cv)
                                <a wire:navigate href="/storage/{{ $application->cv }}"
                                    class="text-blue-600 hover:underline">CV </a>
                            @else
                                <button class="text-danger-600" disabled>Tidak ada CV </button>
                            @endif
                            |
                            <a wire:navigate href="/hrd/applications/{{ $application->id }}"
                                class="text-blue-600 hover:underline">
                                Surat
                                Lamaran </a>

                        </td>

                        <td class="px-6 py-4">
                            <div class="flex gap-1">
                                @if ($application->status == -1)
                                    <a wire:navigate href="/hrd/applications/{{ $application->id }}/accept" wire:confirm="Anda yakin?"
                                        class="inline-flex items-center px-2 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium">

                                        <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 -960 960 960"  fill="#f9fafb"
                                          class="h-5 w-5 mr-2">
                                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                                        </svg>
                                        Terima</a>

                                    <button wire:click="reject({{ $application->id }})" wire:confirm="Anda yakin?"
                                        class="inline-flex items-center px-2 py-1.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 mr-2"
                                            fill="#f9fafb">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path
                                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                                        </svg>
                                        Tolak
                                    </button>
                                @elseif ($application->status == 0)
                                <span
                                class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -960 960 960" class="h-4 w-4">
                                    <path
                                        d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" fill='#dc2626'/>
                                </svg>
                                Ditolak
                            </span>
                                @elseif ($application->status == 1)
                                <span
                                class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                    class="h-4 w-4">
                                    <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"
                                        fill='#16a34a' />
                                </svg>
                                Diterima
                            </span>
                                @endif
                            </div>
                        </td>

                    </tr>
                @empty
                    <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Data HRD tidak tersedia.</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
