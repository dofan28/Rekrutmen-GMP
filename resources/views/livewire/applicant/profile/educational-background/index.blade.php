<div>
    <div class="text-start">
        @include('dashboard.partials.profile.title')
    </div>
    @if (session()->has('success'))
        <x-alert type='success' :message="session('success')"></x-alert>
    @endif
    <!-- section content -->
    <div class="flex items-center justify-start w-full h-40 p-8 mt-4 overflow-hidden bg-gray-50">
        @include('dashboard.partials.profile.account-info')
    </div>
    <div class="grid grid-cols-12">
        <div
            class="flex flex-wrap justify-center w-full col-span-12 py-6 pr-3 space-x-4 space-y-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start">
            @include('dashboard.partials.profile.navigation')
        </div>

        <div
            class="h-full col-span-12 pb-12 md:border-solid md:border-l md:border-gray-800 md:border-opacity-25 md:col-span-10">
            <div class="py-4 md:pl-4">
                <div class="flex flex-col p-4 space-y-4 bg-gray-50">
                    <div class="max-w-3xl">
                        @if (
                            !auth()->user()->contact ||
                                !auth()->user()->contact ||
                                auth()->user()->educationalbackground->isEmpty() ||
                                auth()->user()->workexperience->isEmpty() ||
                                auth()->user()->organizationalexperience->isEmpty())
                            <div class="p-4 bg-yellow-100 border-l-4 border-yellow-600">

                                <div class="flex space-x-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960"
                                            width="35" fill='#d97706'>
                                            <path
                                                d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-88h120v88q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Zm120-160h80v-200h-80v200Zm40 120q17 0 28.5-11.5T520-360q0-17-11.5-28.5T480-400q-17 0-28.5 11.5T440-360q0 17 11.5 28.5T480-320Z" />
                                        </svg>
                                    </div>

                                    <div>
                                        <h4 class="text-base font-semibold text-yellow-600 font-montserrat">PERHATIAN!
                                        </h4>
                                        <div class="text-sm font-light text-justify text-gray-800 font-poppins ">
                                            Jika Anda belum melengkapi data profil Anda, harap isi dengan benar. Data
                                            tersebut akan menjadi bagian penting dalam proses melamar lowongan kerja
                                            atau seleksi lamaran. Informasi yang perlu dilengkapi meliputi:
                                            <ul class="my-1 ml-6 list-disc">
                                                <li>Data Pribadi <span class="font-semibold text-red-600">*</span></li>
                                                <li>Kontak <span class="font-semibold text-red-600">*</span></li>
                                                <li>Riwayat Pendidikan (Opsional)</li>
                                                <li>Pengalaman Kerja (Opsional)</li>
                                                <li>Pengalaman Organisasi (Opsional)</li>
                                            </ul>
                                            Meskipun bersifat opsional, Data mengenai Riwayat Pendidikan, Pengalaman
                                            Kerja, dan Pengalaman Organisasi akan menjadi nilai tambah dalam proses
                                            seleksi lamaran.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        @if (auth()->user()->educationalbackground->isEmpty())
                            <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">Riwayat
                                Pendidikan
                            </h3>
                            <p class="my-2 text-sm font-light text-gray-800 font-poppins ">Lengkapi data riwayat
                                pendidikan berikut. Untuk menjadi nilai tambah dalam proses seleksi lamaran.</p>
                        @else
                            <div class="flex justify-between w-full">
                                <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">Riwayat
                                    Pendidikan
                                </h3>
                                <a wire:navigate href="/applicant/profile/educationalbackgrounds/create"
                                    class="relative flex items-center w-32 h-8 bg-blue-800 border border-blue-800 cursor-pointer group hover:bg-blue-900 active:bg-blue-900 active:border-blue-900">
                                    <span
                                        class="ml-5 text-sm transition-all duration-300 transform text-gray-50 group-hover:translate-x-20 font-poppins">Tambah</span>
                                    <span
                                        class="absolute right-0 flex items-center justify-center w-10 h-full transition-all duration-300 transform bg-blue-800 group-hover:translate-x-0 group-hover:w-full">
                                        <svg class="w-8 svg text-gray-50" fill="none" height="24"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" viewBox="0 0 24 24" width="24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <line x1="12" x2="12" y1="5" y2="19"></line>
                                            <line x1="5" x2="19" y1="12" y2="12"></line>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        @endif
                        <hr class="mt-2">
                    </div>
                    @if (!auth()->user()->educationalbackground->isEmpty())
                        @foreach (auth()->user()->educationalbackground as $educationalbackground)
                            <div wire:key='{{ $educationalbackground->id }}' class="flex justify-between">
                                <div>
                                    <h4 class="pb-2 text-2xl font-semibold text-gray-800">Pendidikan
                                        {{ $educationalbackground->level }}</h4>
                                    <div>
                                        <label
                                            class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Institusi</label>
                                        <span class="font-light text-gray-800 font-poppins">
                                            {{ $educationalbackground->institution }}
                                        </span>
                                    </div>
                                    <div>
                                        <label
                                            class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Bidang
                                            Studi</label>
                                        <span class="font-light text-gray-800 font-poppins">
                                            {{ $educationalbackground->major }}
                                        </span>
                                    </div>
                                    <div>
                                        <label
                                            class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Gelar</label>
                                        <span class="font-light text-gray-800 font-poppins">
                                            {{ $educationalbackground->title }}
                                        </span>
                                    </div>
                                    <div class="flex">
                                        <div>
                                            <label
                                                class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Tanggal
                                                Mulai</label>
                                            <span
                                                class="font-light text-gray-800 font-poppins">{{ $educationalbackground->start_date }}</span>
                                        </div>
                                        <div class="ml-8">
                                            <label
                                                class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Tanggal
                                                Selesai</label>
                                            <span
                                                class="font-light text-gray-800 font-poppins">{{ $educationalbackground->end_date ?? '' }}</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="flex gap-1">
                                    <div>
                                        <a wire:navigate href="/applicant/profile/educationalbackgrounds/{{ $educationalbackground->id }}/edit"
                                            class="px-3 py-1 text-sm bg-blue-800 text-gray-50 font-poppins hover:bg-blue-900 focus:bg-blue-900">Ubah</a>
                                    </div>
                                    <x-modal-confirmation action="delete2" :identify="'riwayat pendidikan terkait dengan institusi ' .
                                        $educationalbackground->institution .
                                        ''" :data="$educationalbackground">
                                        <button @click="showModal = true"
                                            class="inline-block px-3 py-1 text-sm bg-red-600 text-gray-50 font-poppins focus:bg-red-700 hover:bg-red-700">Hapus</button>
                                    </x-modal-confirmation>

                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @else
                        <form wire:submit='save'>
                            <div class="mb-4">
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Jenjang
                                    Pendidikan</label>
                                <input wire:model='level' type="text" name="level" placeholder="contoh: S1"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('level') border-red-500 @enderror border-gray-800"
                                    required autofocus>
                                @error('level')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Institusi</label>
                                <input wire:model='institution' type="text" name="institution"
                                    placeholder="contoh: Universitas Indonesia"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('institution') border-red-500 @enderror border-gray-800"
                                    required>
                                @error('institution')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Bidang Studi</label>
                                <input wire:model='major' type="text" name="major"
                                    placeholder="contoh: Teknik Kimia"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('major') border-red-500 @enderror border-gray-800"
                                    required>
                                @error('major')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Gelar</label>
                                <input wire:model='title' type="text" name="title"
                                    placeholder="contoh: Sarjana Teknik (S.T.)"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('title') border-red-500 @enderror border-gray-800"
                                    required>
                                @error('title')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                                <div class="w-full">
                                    <label class="block mb-1 font-semibold text-gray-800 font-poppins">Tanggal
                                        Mulai</label>
                                    <input wire:model='start_date' type="date" name="start_date"
                                        placeholder="contoh: 01/30/2024"
                                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('start_date') border-red-500 @enderror border-gray-800"
                                        required>
                                    @error('start_date')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label class="block mb-1 font-semibold text-gray-800 font-poppins">Tanggal
                                        Selesai</label>
                                    <input wire:model='end_date' type="date" name="end_date"
                                        placeholder="contoh: 01/30/2024"
                                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins  @error('end_date') border-red-500 @enderror  border-gray-800">
                                    @error('end_date')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-center my-6">
                                <button type="submit"
                                    class="px-4 py-2 font-semibold text-gray-100 bg-blue-800 hover:bg-blue-900 font-montserrat">SIMPAN</button>
                            </div>
                        </form>
                    @endif
                </div>



            </div>
        </div>


    </div>
</div>
