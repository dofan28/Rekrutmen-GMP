<div>
    <header>
        <nav class="w-full pt-14 lg:py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Data Akun HRD</h2>
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
                                    {{   Auth::user()->username }}</h6>
                                <span class="text-xs">Admin</span>
                            </div>
                            @if (  Auth::user()->applicantdata->photo ?? '')
                                <img class="rounded-full"
                                    src="{{ asset('storage/' .   Auth::user()->applicantdata->photo) }}"
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
            <a wire:navigate href="/admin/hrds/create">
                <button type="submit"
                    class="px-4 py-2 mb-6 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-800">Buat Data Akun</button>
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
        @if ($hrds->where('deleted_at', null)->isEmpty())
            <div class="mt-24 text-gray-600">
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Data HRD tidak tersedia.</h1>
            </div>
        @else
            <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                <thead class="border-b border-gray-200 bg-gray-50">
                    <tr class="text-left text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Lengkap</th>
                        <th class="px-4 py-3">Posisi</th>
                        <th class="px-4 py-3">Detail</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($hrds as $hrd)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $hrd->username }}</td>
                            <td class="px-4 py-3">
                                <div x-data="{ isOpen: false, inputLainnya: false }">
                                    <span x-show="!isOpen">{{ $hrd->hrddata->hrd_position }}</span>
                                    <div x-show="isOpen">
                                        <form wire:submit.prevent="updateHRDPosition({{ $hrd->id }})">
                                            <select wire:model='hrd_position'  wire:change='updateInputLainnya' id="hrd_position"
                                                class="@error('hrd_position') is-invalid @enderror" required>
                                                <option value="">Pilih Posisi</option>
                                                <option value="Staff Recruitment">Staff Recruitment</option>
                                                <option value="Staff Payroll">Staff Payroll</option>
                                                <option value="Benefits Specialist">Benefits Specialist</option>
                                                <option value="Staff Pelatihan dan Pengembangan Karyawan">Staff
                                                    Pelatihan dan Pengembangan Karyawan
                                                </option>
                                                <option value="Staff Business Partner">Staff Business Partner</option>
                                                <option value="Staff Industrial Relational Manager">Staff Industrial
                                                    Relational Manager</option>
                                                <option value="Staff HRD Manager">Staff HRD Manager</option>
                                                <option value="Chief HR Officer">Chief HR Officer</option>
                                                <option  value="lainnya">Lainnya</option>
                                            </select>
                                            <input type="text" wire:model="hrd_position_text"
                                                class="p-2 border border-gray-300 rounded-md mt-2 @error('hrd_position') is-invalid @enderror"
                                                placeholder="Masukkan posisi baru">
                                            @error('hrd_position')
                                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                                            @enderror
                                            <button type="submit"
                                                class="px-2 py-1 font-medium text-white bg-green-600 rounded-md">Simpan</button>
                                        </form>
                                    </div>
                                    <button @click="isOpen = !isOpen"
                                        x-bind:class="isOpen ? 'bg-red-600' : 'bg-blue-600'"
                                        x-text="isOpen ? 'Batal' : 'Ganti'" type="button"
                                        class="px-2 py-1 font-medium text-white bg-blue-600 rounded-md">Ganti</button>

                                    </div>
                            </td>
                            <td class="px-4 py-3"><a wire:navigate href="/admin/hrds/{{ $hrd->id }}"
                                    class="px-2 py-1 font-medium text-white bg-blue-600 rounded-md">Detail</a></td>
                            <td class="px-4 py-3">
                                <button type="submit" wire:click="delete({{ $hrd->id }})" wire:confirm="Anda yakin?" class="inline-block px-2 py-1 text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>

</div>
