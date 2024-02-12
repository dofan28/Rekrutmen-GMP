<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl font-bold tracking-wide text-gray-800 font-montserrat">Data Pelamar</h2>
    </div>
    @if (session()->has('success'))
        <x-alert type='success' :message="session('success')"></x-alert>
    @endif
    <div class="w-full mt-4 overflow-auto border border-blue-200">
        <table class="w-full text-left text-gray-800 bg-white border-collapse">
            <thead class="text-base bg-gray-50">
                <tr>
                    <th scope="col" class="px-2 py-4 font-semibold text-gray-800 font-poppins">Nama</th>
                    <th scope="col" class="px-2 py-4 font-semibold text-gray-800 font-poppins">Data Pribadi</th>
                    <th scope="col" class="px-2 py-4 font-semibold text-gray-800 font-poppins">Kontak</th>
                    <th scope="col" class="px-2 py-4 font-semibold text-gray-800 font-poppins">Riwayat Pendidikan
                    </th>
                    <th scope="col" class="px-2 py-4 font-semibold text-gray-800 font-poppins">Pengalaman Kerja</th>
                    <th scope="col" class="px-2 py-4 font-semibold text-gray-800 font-poppins">Pengalaman Organisasi
                    </th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Aksi</th>
                </tr>
            </thead>
            <tbody class="border-t border-gray-100 divide-y divide-gray-100 font-poppins">
                @forelse ($applicants as $applicant)
                    <tr wire:key='{{ $applicant->id }}' class="hover:bg-gray-50">
                        <th class="flex gap-3 px-2 py-4 font-normal text-gray-900">
                            <div class="relative w-10 h-10">
                                @if ($applicant->applicantdata && $applicant->applicantdata->photo)
                                    <img class="object-cover object-center w-full h-full"
                                        src="{{ asset('storage/' . $applicant->applicantdata->photo) }}"
                                        alt="{{ $applicant->username }}" />
                                @else
                                    <img class="object-cover object-center w-full h-full"
                                        src="/images/profile/default.jpg" alt="{{ $applicant->username }}" />
                                @endif
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">{{ $applicant->username }}</div>
                                <div class="text-xs text-gray-400">{{ $applicant->email }}</div>
                            </div>
                        </th>

                        <td class="px-2 py-4 text-sm ">
                            <div class="flex items-center justify-start lg:flex-row md:flex-row sm:flex-col ">
                                @if (isset($applicant->applicantdata))
                                    <span class="line-clamp-1">{{ $applicant->applicantdata->full_name }}</span>
                                    <a wire:navigate
                                        href="/admin/applicant/applicantdata/{{ $applicant->applicantdata->id }}"
                                        x-data="{ isHovered: false }" @mouseover="isHovered = true"
                                        @mouseout="isHovered = false" href="#" class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="p-1 h-7 w-7 hover:bg-gray-200 hover:text-blue-600"
                                            viewBox="0 -960 960 960" :fill="isHovered ? '#1e40af' : '#1f2937'">
                                            <path
                                                d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                        </svg>

                                        <div x-show="isHovered"
                                            class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                            Detail
                                        </div>
                                    </a>
                                @else
                                    Tidak Ada
                                @endif

                            </div>
                        </td>

                        <td class="px-2 py-4 text-sm ">
                            <div class="flex items-center justify-start lg:flex-row md:flex-row sm:flex-col ">
                                @if (isset($applicant->contact))
                                    <span class="line-clamp-1">{{ $applicant->contact->street }}</span>
                                    <a wire:navigate href="/admin/applicant/contact/{{ $applicant->contact->id }}"
                                        x-data="{ isHovered: false }" @mouseover="isHovered = true"
                                        @mouseout="isHovered = false" href="#" class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="p-1 h-7 w-7 hover:bg-gray-200 hover:text-blue-600"
                                            viewBox="0 -960 960 960" :fill="isHovered ? '#1e40af' : '#1f2937'">
                                            <path
                                                d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                        </svg>

                                        <div x-show="isHovered"
                                            class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                            Detail
                                        </div>
                                    </a>
                                @else
                                    Tidak Ada
                                @endif

                            </div>
                        </td>
                        <td class="px-2 py-4 text-sm ">
                            <div class="flex items-center justify-start lg:flex-row md:flex-row sm:flex-col ">
                                @if (!blank($applicant->educationalbackground))
                                    <span
                                        class="line-clamp-1">{{ $applicant->educationalbackground->first()->institution }}</span>
                                    <a wire:navigate href="/admin/applicant/educationalbackground/{{ $applicant->id }}"
                                        x-data="{ isHovered: false }" @mouseover="isHovered = true"
                                        @mouseout="isHovered = false" href="#" class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="p-1 h-7 w-7 hover:bg-gray-200 hover:text-blue-600"
                                            viewBox="0 -960 960 960" :fill="isHovered ? '#1e40af' : '#1f2937'">
                                            <path
                                                d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                        </svg>

                                        <div x-show="isHovered"
                                            class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                            Detail
                                        </div>
                                    </a>
                                @else
                                    Tidak Ada
                                @endif
                            </div>
                        </td>
                        <td class="px-2 py-4 text-sm ">
                            <div class="flex items-center justify-start lg:flex-row md:flex-row sm:flex-col ">
                                @if (!blank($applicant->workexperience))
                                    <span
                                        class="line-clamp-1">{{ $applicant->workexperience->first()->position }}</span>
                                    <a wire:navigate href="/admin/applicant/workexperience/{{ $applicant->id }}"
                                        x-data="{ isHovered: false }" @mouseover="isHovered = true"
                                        @mouseout="isHovered = false" href="#" class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="p-1 h-7 w-7 hover:bg-gray-200 hover:text-blue-600"
                                            viewBox="0 -960 960 960" :fill="isHovered ? '#1e40af' : '#1f2937'">
                                            <path
                                                d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                        </svg>

                                        <div x-show="isHovered"
                                            class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                            Detail
                                        </div>
                                    </a>
                                @else
                                    Tidak Ada
                                @endif
                            </div>
                        </td>
                        <td class="px-2 py-4 text-sm ">
                            <div class="flex items-center justify-start lg:flex-row md:flex-row sm:flex-col ">
                                @if (!blank($applicant->organizationalexperience))
                                    <span
                                        class="line-clamp-1">{{ $applicant->organizationalexperience->first()->organizational_name }}</span>
                                    <a wire:navigate
                                        href="/admin/applicant/organizationalexperience/{{ $applicant->id }}"
                                        x-data="{ isHovered: false }" @mouseover="isHovered = true"
                                        @mouseout="isHovered = false" href="#" class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="p-1 h-7 w-7 hover:bg-gray-200 hover:text-blue-600"
                                            viewBox="0 -960 960 960" :fill="isHovered ? '#1e40af' : '#1f2937'">
                                            <path
                                                d="m298-262-56-56 121-122H80v-80h283L242-642l56-56 218 218-218 218Zm222-18v-80h360v80H520Zm0-320v-80h360v80H520Zm120 160v-80h240v80H640Z" />
                                        </svg>

                                        <div x-show="isHovered"
                                            class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                            Detail
                                        </div>
                                    </a>
                                @else
                                    Tidak Ada
                                @endif
                            </div>
                        </td>

                        <td class="px-2 py-4">
                            <x-modal-confirmation action="delete" :identify="$applicant->username" :data="$applicant">
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
