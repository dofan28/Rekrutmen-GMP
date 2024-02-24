@push('styles')
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
@endpush
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
                    @include('dashboard.partials.profile.warning-info')
                    <div class="mb-3">
                        @if (auth()->user()->workexperience->isEmpty())
                            <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">Pengalaman
                                Kerja
                            </h3>
                            <p class="my-2 text-sm font-light text-gray-800 font-poppins ">Lengkapi data pengalaman
                                kerja berikut. Untuk menjadi bahan pertimbangan dalam proses seleksi lamaran.</p>
                        @else
                            <div class="flex justify-between w-full">
                                <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">
                                    Pengalaman Kerja
                                </h3>
                                <a wire:navigate href="/applicant/profile/workexperiences/create"
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
                    @if (!auth()->user()->workexperience->isEmpty())
                        @foreach (auth()->user()->workexperience as $workexperience)
                            <div wire:key='{{ $workexperience->id }}' class="flex justify-between">
                                <div>
                                    <h4 class="pb-2 text-xl font-semibold text-gray-800">Pengalaman Kerja di
                                        {{ $workexperience->company }}</h4>
                                    <div>
                                        <label
                                            class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Posisi</label>
                                        <span class="font-light text-gray-800 font-poppins">
                                            {{ $workexperience->position }}
                                        </span>
                                    </div>
                                    <div>
                                        <label
                                            class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Gaji
                                            Terakhir</label>
                                        <span class="font-light text-gray-800 font-poppins">
                                            {{ $workexperience->last_salary }}
                                        </span>
                                    </div>

                                    <div class="flex">
                                        <div>
                                            <label
                                                class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Tanggal
                                                Mulai</label>
                                            <span
                                                class="font-light text-gray-800 font-poppins">{{ $workexperience->start_date }}</span>
                                        </div>
                                        <div class="ml-8">
                                            <label
                                                class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Tanggal
                                                Selesai</label>
                                            <span
                                                class="font-light text-gray-800 font-poppins">{{ $workexperience->end_date ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label
                                            class="block mb-1 font-semibold tracking-wide text-gray-800 font-poppins">Deskripsi
                                            Pekerjaan</label>
                                        <span class="font-light text-gray-800 font-poppins">
                                            {!! $workexperience->job_description !!}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex gap-1">
                                    <div>
                                        <a wire:navigate
                                            href="/applicant/profile/workexperiences/{{ $workexperience->id }}/edit"
                                            class="px-3 py-1 text-sm bg-blue-800 text-gray-50 font-poppins hover:bg-blue-900 focus:bg-blue-900">Ubah</a>
                                    </div>
                                    <x-modal-confirmation action="delete2" :identify="'pengalaman kerja terkait dengan perusahaan ' .
                                        $workexperience->company .
                                        ''" :data="$workexperience">
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
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Perusahaan</label>
                                <input wire:model='company' type="text" name="company"
                                    placeholder="contoh: PT. Graha Mutu Persada"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('company') border-red-500 @enderror border-gray-800"
                                    required autofocus>
                                @error('company')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Posisi</label>
                                <input wire:model='position' type="text" name="position"
                                    placeholder="contoh: Staff Analisis Kimia"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('position') border-red-500 @enderror border-gray-800"
                                    required>
                                @error('position')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 font-semibold text-gray-800 font-poppins">Gaji Terakhir</label>
                                <input wire:model='last_salary' type="text" name="last_salary"
                                    placeholder="contoh: 3000000"
                                    class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('last_salary') border-red-500 @enderror border-gray-800"
                                    required>
                                @error('last_salary')
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
                            <div class="mb-2">
                                <label for="job_description"
                                    class="block mb-1 text-gray-800 font-semibold font-poppins">Deskripsi Pekerjaan
                                </label>
                                <input wire:model='job_description' type="hidden" id="job_description"
                                    class="hidden">
                                <div wire:ignore>
                                    <trix-editor wire:model="job_description" input="job_description"
                                        class="w-full  rounded-none h-32 appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('job_description') border-red-500 @enderror"></trix-editor>
                                </div>
                                @error('job_description')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
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
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
@endpush
