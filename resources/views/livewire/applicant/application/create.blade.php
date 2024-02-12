@push('styles')
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
@endpush
<div x-data="{ modelOpen: false }" class="pt-28 pb-16 px-36">
    <div class="flex flex-col justify-center bg-slate-50 px-16 py-10  border border-blue-200">
        <div class="text-start">
            <h2 class="text-3xl tracking-wide font-bold text-gray-800">Mengajukan Lamaran</h2>
            <p class="mt-2 text-gray-800 font-poppins">Anda mengajukan lamaran lowongan kerja sebagai
                {{ $job->position }} di perusahaan {{ $job->jobcompany->name }}?</p>
        </div>
        <div class="mt-6">
            <form wire:submit='save'>
                <div class="mb-2">
                    <label for="image" class="flex justify-between text-gray-800 font-semibold font-poppins">Unggah
                        CV
                        (Format PDF)
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

                    <label for="image" class="flex justify-between text-gray-800 font-semibold font-poppins">Pesan
                        Lamaran
                        <span class="text-xs font-light">(Opsional)</span>
                    </label>
                    <input wire:model='applcant_letter' type="hidden" id="applcant_letter" class="hidden">
                    <div wire:ignore>
                        <trix-editor wire:model="applcant_letter" input="applcant_letter"
                            class="w-full  rounded-none h-32 appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('applcant_letter') border-red-500 @enderror"></trix-editor>
                    </div>
                    @error('applicant_letter')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                    role="dialog" aria-modal="true">
                    <div
                        class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                            <div class="flex items-center justify-between space-x-4">
                                <h1 class="text-xl font-medium text-gray-800 ">Invite team memebr</h1>

                                <button @click="modelOpen = false"
                                    class="text-gray-600 focus:outline-none hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>

                            <p class="mt-2 text-sm text-gray-500 ">
                                Add your teammate to your team and start work to get things done
                            </p>

                            <form class="mt-5">
                                <div>
                                    <label for="user name"
                                        class="block text-sm text-gray-700 capitalize dark:text-gray-200">Teammate
                                        name</label>
                                    <input placeholder="Arthur Melo" type="text"
                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                </div>

                                <div class="mt-4">
                                    <label for="email"
                                        class="block text-sm text-gray-700 capitalize dark:text-gray-200">Teammate
                                        email</label>
                                    <input placeholder="arthurmelo@example.app" type="email"
                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                </div>

                                <div class="mt-4">
                                    <h1 class="text-xs font-medium text-gray-400 uppercase">Permissions</h1>

                                    <div class="mt-4 space-y-5">
                                        <div class="flex items-center space-x-3 cursor-pointer" x-data="{ show: true }"
                                            @click="show =!show">
                                            <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                                :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                                <label for="show" @click="show =!show"
                                                    class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                                    :class="[show ? 'translate-x-full border-indigo-500' :
                                                        'translate-x-0 border-gray-300'
                                                    ]"></label>
                                                <input type="checkbox" name="show"
                                                    class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none" />
                                            </div>

                                            <p class="text-gray-500">Can make task</p>
                                        </div>

                                        <div class="flex items-center space-x-3 cursor-pointer" x-data="{ show: false }"
                                            @click="show =!show">
                                            <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                                :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                                <label for="show" @click="show =!show"
                                                    class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                                    :class="[show ? 'translate-x-full border-indigo-500' :
                                                        'translate-x-0 border-gray-300'
                                                    ]"></label>
                                                <input type="checkbox" name="show"
                                                    class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none" />
                                            </div>

                                            <p class="text-gray-500">Can delete task</p>
                                        </div>

                                        <div class="flex items-center space-x-3 cursor-pointer"
                                            x-data="{ show: true }" @click="show =!show">
                                            <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                                :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                                <label for="show" @click="show =!show"
                                                    class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                                    :class="[show ? 'translate-x-full border-indigo-500' :
                                                        'translate-x-0 border-gray-300'
                                                    ]"></label>
                                                <input type="checkbox" name="show"
                                                    class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none" />
                                            </div>

                                            <p class="text-gray-500">Can edit task</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end mt-6">
                                    <button type="button"
                                        class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                        Invite Member
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    <button @click="modelOpen =!modelOpen" type="button"
                        class="px-4 py-2 text-gray-100 bg-blue-800 hover:bg-blue-900 font-semibold font-montserrat">
                        AJUKAN LAMARAN
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

@push('scripts')
    <script type="text/javascript" src="{{ asset('css/trix.css') }}"></script>
@endpush
