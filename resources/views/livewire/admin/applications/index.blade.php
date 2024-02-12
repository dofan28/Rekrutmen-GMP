<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl font-bold tracking-wide text-gray-800 font-montserrat">Data Lamaran</h2>
    </div>
    @if (session()->has('success'))
        <x-alert type='success' :message="session('success')"></x-alert>
    @endif
    <div class="w-full mt-4 border border-blue-200">
        <table class="w-full text-left text-gray-800 bg-white border-collapse">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Pelamar</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Lowongan Kerja</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Lamaran</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Aksi</th>
                </tr>
            </thead>
            <tbody class="border-t border-gray-100 divide-y divide-gray-100 font-poppins">
                @forelse ($applications as $application)
                    <tr wire:key='{{ $application->id }}' class="hover:bg-gray-50">
                        <th class="flex items-center gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="relative w-10 h-10">
                                @if ($application->applicant->applicantdata && $application->applicant->applicantdata->photo)
                                <img class="object-cover object-center w-full h-full"
                                    src="{{ asset('storage/' . $application->applicant->applicantdata->photo) }}"
                                    alt="{{ $application->applicant->username }}" />
                            @else
                                <img class="object-cover object-center w-full h-full"
                                    src="/images/profile/default.jpg" alt="{{ $application->applicant->username }}" />
                            @endif
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">{{ $application->applicant->username }}</div>
                                <div class="text-gray-400">{{ $application->applicant->email }}</div>
                            </div>
                            <a wire:navigate href="/admin/applications/applicant/{{ $application->applicant->id }}"
                                x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                href="#" class="relative">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="p-1 h-7 w-7 hover:bg-gray-200 hover:text-blue-600"
                                    viewBox="0 -960 960 960" :fill="isHovered ? '#1e40af' : '#1f2937'">
                                    <path
                                        d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                </svg>

                                <div x-show="isHovered" class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                    Detail
                                </div>
                            </a>
                        </th>

                        <td class="px-6 py-4 text-sm ">
                            <div class="flex items-center justify-start gap-1 lg:flex-row md:flex-row sm:flex-col">
                                <span>{{ $application->job->position }}</span>
                                <a wire:navigate href="/admin/applications/job/{{ $application->job->id }}"
                                    x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                    href="#" class="relative">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="p-1 h-7 w-7 hover:bg-gray-200 hover:text-blue-600"
                                        viewBox="0 -960 960 960" :fill="isHovered ? '#1e40af' : '#1f2937'">
                                        <path
                                            d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                    </svg>

                                    <div x-show="isHovered" class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                        Detail
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm ">
                            <div class="flex items-center justify-start gap-1 lg:flex-row md:flex-row sm:flex-col">
                                <span>
                                    @if ($application->status == -1)
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold text-yellow-600 rounded-full bg-yellow-50">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                                class="w-4 h-4">
                                                <path
                                                    d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"
                                                    fill='#ca8a04' />
                                            </svg>
                                            Menunggu
                                        </span>
                                    @elseif ($application->status == 0)
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold text-red-600 rounded-full bg-red-50">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 -960 960 960" class="w-4 h-4">
                                                <path
                                                    d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" fill='#dc2626'/>
                                            </svg>
                                            Ditolak
                                        </span>
                                    @elseif ($application->status == 1)
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold text-green-600 rounded-full bg-green-50">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                                class="w-4 h-4">
                                                <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"
                                                    fill='#16a34a' />
                                            </svg>
                                            Diterima
                                        </span>
                                    @endif
                                </span>
                                <a wire:navigate href="/admin/applications/{{ $application->id }}"
                                    x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                    href="#" class="relative">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="p-1 h-7 w-7 hover:bg-gray-200 hover:text-blue-600"
                                        viewBox="0 -960 960 960" :fill="isHovered ? '#1e40af' : '#1f2937'">
                                        <path
                                            d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                    </svg>

                                    <div x-show="isHovered" class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                        Detail
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <x-modal-confirmation action="delete" :identify="'lamaran '.$application->applicant->username.''" :data="$application">
                                <div x-data="{ isHovered: false }">
                                    <button @click="showModal = true" @mouseover="isHovered = true"
                                        @mouseout="isHovered = false" class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                            class="w-8 h-8 p-1 hover:bg-gray-200 hover:text-blue-600"
                                            :fill="isHovered ? '#1e40af' : '#1f2937'">
                                            <path
                                                d="M200-120v-600h-40v-80h200v-40h240v40h200v80h-40v600H200Zm80-80h400v-520H280v520Zm80-80h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                        </svg>
                                        <div x-show="isHovered"
                                            class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                            Hapus
                                        </div>
                                    </button>
                                </div>
                            </x-modal-confirmation>
                        </td>

                    </tr>
                @empty
                    <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Data lamaran tidak tersedia.</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
