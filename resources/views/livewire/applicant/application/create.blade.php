{{-- <div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Ajukan Lamaran</h2>
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
                                    {{ Auth::user()->username }}</h6>
                                <span class="text-xs">Pelamar</span>
                            </div>
                            @if (Auth::user()->applicantdata->photo ?? '')
                                <img class="rounded-full"
                                    src="{{ asset('storage/' . Auth::user()->applicantdata->photo) }}"
                                    width="35px" srcset="">
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="px-6 py-4 lg:px-20 xl:px-36">
        <div class="p-6 bg-white rounded-lg shadow-md ">
            <p class="text-lg font-medium text-justify">Kamu akan melamar pekerjaan {{ $job->position }} di
                {{ $job->jobcompany->name }}
            </p>
            <form wire:submit='save' enctype="multipart/form-data" class="mt-4">
                <input wire:model="job_id" type="hidden" value="{{ $job->id }}">
                @error('job_id')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
                <div class="mt-8">
                    <label for="cv" class="block mb-2 font-bold text-gray-700 text-medium">Masukkan CV (Format
                        PDF, DOC, atau DOCX)</label>
                    <input wire:model ='cv' type="file" id="cv"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-1 focus:shadow-outline @error('cv') is-invalid @enderror">
                    @error('cv')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="applicant_letter" class="block mb-2 font-bold text-gray-700 text-medium">Pesan
                        Lamaran</label>
                    <input wire:model='applicant_letter' type="hidden" id="applicant_letter" class="hidden">
                    <div wire:ignore>
                        <trix-editor wire:model="applicant_letter" input="applicant_letter"></trix-editor>
                    </div>
                    @error('applicant_letter')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="px-4 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-800">
                        Kirimkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="pt-28 pb-16 px-36">
    <div class="flex flex-col justify-center bg-slate-50 px-16 py-10  border border-blue-200">
        <div class="text-start">
            <h2 class="text-3xl tracking-wide font-bold text-gray-800">Mengajukan Lamaran</h2>
            <p class="mt-2 text-gray-800 font-poppins">Anda melamar lowongan kerja sebagai {{ $job->position }} di perusahaan {{ $job->jobcompany->name }}</p>
        </div>
        <div class="mt-6">
        <form wire:submit='save'>
            <div class="mb-2">
                <label for="image"
                class="flex justify-between text-gray-800 font-semibold font-poppins">Unggah CV (Format PDF)
                <span class="text-xs font-light">(Opsional)</span>
            </label>

                <div wire:loading wire:target='cv'>
                    <span class="text-blue-600">Mengunggah ...</span>
                </div>
                <label class="block">
                    <input wire:model='cv' type="file" id="cv"
                        class="block w-full text-gray-800 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins  border-gray-800 @error('cv') border-red-500 @enderror
                          file:me-4 file:py-2 file:px-3
                           file:border-0
                          file:text-sm file:font-semibold
                          file:bg-blue-800 file:text-white
                          hover:file:bg-blue-900
                          file:disabled:opacity-50 file:disabled:pointer-events-none
                        ">
                </label>
                @error('cv')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-2">

                <label for="image"
                class="flex justify-between text-gray-800 font-semibold font-poppins">Pesan Lamaran
                <span class="text-xs font-light">(Opsional)</span>
            </label>
                <input wire:model='applcant_letter' type="hidden" id="applcant_letter" class="hidden">
                <div wire:ignore>
                    <trix-editor wire:model="applcant_letter" input="applcant_letter"
                        class="w-full  rounded-none h-32 appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('applcant_letter') border-red-500 @enderror"></trix-editor>
                </div>
                @error('applcant_letter')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-6 flex justify-center">
                <button type="submit"
                    class="px-4 py-2 text-gray-100 bg-blue-800 hover:bg-blue-900  font-semibold font-montserrat">AJUKAN LAMARAN</button>
            </div>
        </form>
    </div>
    </div>
</div>
