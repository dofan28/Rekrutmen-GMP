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
                    <a wire:navigate href="/applicant/profile/organizationalexperiences"
                        class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                            class="w-5 h-5">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                        </svg>
                        <span class="text-sm font-poppins">Kembali</span>
                    </a>
                    <div class="mb-3">
                        <h3 class="text-2xl font-semibold tracking-wide text-blue-800 font-montserrat">Ubah Pengalaman
                            Kerja
                        </h3>
                        <p class="my-2 text-sm font-light text-gray-800 font-poppins "> Pastikan anda mengubah data
                            dengan benar. Hal ini, karena Data tersebut akan menjadi pertimbangan penting dalam proses
                            seleksi lamaran.</p>
                        <hr class="mt-2">
                    </div>
                    <form wire:submit='update'>
                        <div class="mb-4">
                            <label class="block mb-1 font-semibold text-gray-800 font-poppins">Nama
                                Organisasi</label>
                            <input wire:model='organizational_name' type="text" name="organizational_name"
                                placeholder="contoh: Badan Eksekutif Mahasiswa"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('organizational_name') border-red-500 @enderror border-gray-800"
                                required autofocus>
                            @error('organizational_name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1 font-semibold text-gray-800 font-poppins">Posisi</label>
                            <input wire:model='position' type="text" name="position" placeholder="contoh: Sekretaris"
                                class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins @error('position') border-red-500 @enderror border-gray-800"
                                required>
                            @error('position')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="organizational_description"
                                class="block mb-1 text-gray-800 font-semibold font-poppins">Deskripsi Organisasi
                            </label>
                            <input wire:model='organizational_description' type="hidden"
                                id="organizational_description" class="hidden" value="{!! $organizationalexperience->organizational_description !!}">
                            <div wire:ignore>
                                <trix-editor wire:model="organizational_description" input="organizational_description"
                                    class="w-full  rounded-none h-32 appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('organizational_description') border-red-500 @enderror"></trix-editor>
                            </div>
                            @error('organizational_description')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-center my-6">
                            <button type="submit"
                                class="px-4 py-2 font-semibold text-gray-100 bg-blue-800 hover:bg-blue-900 font-montserrat">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
@endpush
