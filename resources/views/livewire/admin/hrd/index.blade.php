<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl font-bold tracking-wide text-gray-800 font-montserrat">Data Akun HRD</h2>
    </div>
    <div class="mt-4">
        <a wire:navigate href="/admin/hrds/create"
            class="relative flex items-center w-48 bg-blue-800 cursor-pointer h-9 group hover:bg-blue-900 active:bg-blue-900">
            <span
                class="ml-8 font-semibold text-white transition-all duration-300 transform group-hover:translate-x-20">Buat
                Akun HRD</span>
            <span
                class="absolute right-0 flex items-center justify-center w-10 h-full transition-all duration-300 transform bg-blue-800 rounded-lg group-hover:translate-x-0 group-hover:w-full">
                <svg class="w-8 text-white svg" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <line x1="12" x2="12" y1="5" y2="19"></line>
                    <line x1="5" x2="19" y1="12" y2="12"></line>
                </svg>
            </span>
        </a>
    </div>
    @if (session()->has('success'))
        <x-alert type='success' :message="session('success')"></x-alert>
    @endif
    <div class="w-full mt-3 border border-blue-200">
        <table class="w-full text-left text-gray-800 border-collapse bg-gray-50">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Nama</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Posisi</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-800 font-poppins">Aksi</th>
                </tr>
            </thead>
            <tbody class="border-t border-gray-100 divide-y divide-gray-100 font-poppins">
                @forelse ($hrds as $hrd)
                    <tr wire:key='{{ $hrd->id }}' class="hover:bg-gray-50">
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="relative w-10 h-10">
                                @if ($hrd->hrddata && $hrd->hrddata->photo)
                                    <img class="object-cover object-center w-full h-full"
                                        src="{{ asset('storage/' . $hrd->hrddata->photo) }}"
                                        alt="{{ $hrd->username }}" />
                                @else
                                    <img class="object-cover object-center w-full h-full"
                                        src="/images/profile/default.jpg" alt="{{ $hrd->username }}" />
                                @endif

                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">{{ $hrd->username }}</div>
                                <div class="text-gray-400">{{ $hrd->email }}</div>
                            </div>
                        </th>

                        <td class="px-6 py-4 text-sm">{{ $hrd->hrddata->hrd_position }}</td>

                        <td class="px-6 py-4">
                            <div class="flex justify-start gap-3 lg:flex-row md:flex-row sm:flex-col">
                                <a x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                    href="#" class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                        class="w-8 h-8 p-1 hover:bg-gray-200 hover:text-blue-600"
                                        :fill="isHovered ? '#1e40af' : '#1f2937'">
                                        <path
                                            d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                    </svg>
                                    <div x-show="isHovered" class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                        Detail
                                    </div>
                                </a>

                                <a x-data="{ isHovered: false }" @mouseover="isHovered = true" @mouseout="isHovered = false"
                                    href="#" class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                        class="w-8 h-8 p-1 hover:bg-gray-200 hover:text-blue-600" fill='#1f2937'
                                        :fill="isHovered ? '#1e40af' : '#1f2937'">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l585-583 167 171-582 582H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                    </svg>
                                    <div x-show="isHovered" class="absolute p-1 mt-1 text-sm text-white bg-gray-800">
                                        Edit
                                    </div>
                                </a>
                                <x-modal-confirmation action="delete" :identify="'akun ' . $hrd->username . ''" :data="$hrd">
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
