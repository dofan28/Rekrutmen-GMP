<div x-data="{ showModal: false }">
    {{ $slot }}
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed z-50 inset-12" x-cloak>
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="inline-block w-full overflow-hidden text-left align-bottom transition-all transform bg-white border border-blue-100 sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        {!! $icon !!}

                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg font-semibold leading-6 text-gray-800 font-montserrat"
                                id="modal-headline"> {{ $title }}</h3>
                            <div class="mt-2 font-poppins">
                                <p class="text-sm text-gray-500"> {!! $description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3 py-2 bg-white sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click='{{ $action }}({{ $data->id }})' @click="deleteItem" type="button"
                        class="inline-flex justify-center w-full px-2 py-1 text-base font-medium bg-red-600 border border-transparent text-gray-50 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 sm:ml-3 sm:w-auto sm:text-sm">
                        Hapus </button>
                    <button @click="showModal = false" type="button"
                        class="inline-flex justify-center w-full px-2 py-1 mt-3 text-base font-medium text-gray-800 bg-white border border-gray-300 shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal </button>
                </div>
            </div>
        </div>
    </div>
</div>
