@push('styles')
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
@endpush
<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Publikasi Lowongan Kerja</h2>
    </div>
    <div class="overflow-auto bg-gray-50 border border-blue-200 mt-4 w-full px-4">
        <a wire:navigate href="/hrd/jobs" class="mt-4 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 -960 960 960" class="w-5 h-5">
                <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
            </svg>
            <span class="text-sm font-poppins">Kembali</span>
        </a>
        <div class="px-8 py-7">
            <form wire:submit='save'>
                <div class="mb-2">
                    <label for="position" class="block mb-1 text-gray-800 font-semibold font-poppins">Posisi
                    </label>
                    <input wire:model='position' type="text" id="position" name="position"
                        placeholder="contoh: Staff Analis Kimia"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('position') border-red-500 @enderror"
                        autofocus required>
                    @error('position')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="jobcompany_id" class="block mb-1 text-gray-800 font-semibold font-poppins">Cabang
                        Perusahaan
                    </label>
                    <select wire:model='jobcompany_id' name="jobcompany_id" id="jobcompany_id"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 @error('jobcompany_id') border-red-500 @enderror">
                        <option value="">Pilih Perusahaan</option>
                        @foreach ($jobcompanies as $jobcompany)
                            <option value="{{ $jobcompany->id }}">{{ $jobcompany->name }}</option>
                        @endforeach
                    </select>
                    @error('jobcompany_id')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="jobeducation_id" class="block mb-1 text-gray-800 font-semibold font-poppins">Minimal
                        Pendidikan
                    </label>
                    <select wire:model='jobeducation_id' name="jobeducation_id" id="jobeducation_id"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins   border-gray-800 @error('jobeducation_id') border-red-500 @enderror">
                        <option value="">Pilih Pendidikan</option>
                        @foreach ($jobeducations as $jobeducation)
                            <option value="{{ $jobeducation->id }}">{{ $jobeducation->name }}</option>
                        @endforeach
                    </select>
                    @error('jobeducation_id')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="jobdesk" class="block mb-1 text-gray-800 font-semibold font-poppins">Jobdesk
                    </label>
                    <textarea wire:model='jobdesk' id="jobdesk" placeholder="Jobdesk"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins  border-gray-800 @error('jobdesk') border-red-500 @enderror"
                        rows="3"></textarea>
                    @error('jobdesk')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="image"
                        class="flex justify-between text-gray-800 font-semibold text-base font-poppins">Unggah Gambar
                        <span class="text-xs font-light">(Opsional)</span>
                    </label>
                    @if ($image)
                        <div class="w-32 mb-2 overflow-hidden rounded h-w-32">
                            <img src="{{ $image->temporaryUrl() }}" alt="image" class="object-cover w-full h-full" />
                        </div>
                    @endif
                    <div wire:loading wire:target='image'>
                        <span class="text-blue-600">Mengunggah ...</span>
                    </div>
                    <label class="block">
                        <input wire:model='image' type="file" accept="image/*" id="image"
                            class="block w-full text-gray-800 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins  border-gray-800 @error('image') border-red-500 @enderror
                              file:me-4 file:py-2 file:px-3
                               file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-800 file:text-white
                              hover:file:bg-blue-900
                              file:disabled:opacity-50 file:disabled:pointer-events-none
                            ">
                    </label>
                    @error('image')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="jobdesk" class="block mb-1 text-gray-800 font-semibold font-poppins">Deskripsi Lowongan
                        Kerja
                    </label>
                    <input wire:model='description' type="hidden" id="description" class="hidden">
                    <div wire:ignore>
                        <trix-editor wire:model="description" input="description"
                            class="w-full  rounded-none h-32 appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('description') border-red-500 @enderror"></trix-editor>
                    </div>
                    @error('description')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-6 flex justify-center">
                    <button type="submit"
                        class="px-4 py-2 text-gray-100 bg-blue-800 hover:bg-blue-900  font-semibold font-montserrat">PUBLIKASI
                        LOWONGAN KERJA</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
@endpush
