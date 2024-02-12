<div x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 5000)">
    <div x-show="showAlert" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-end="opacity-0 transform translate-x-4"
        class="container fixed right-0 z-40 w-auto px-4 py-2 leading-normal top-20">
        <div class="flex items-center justify-between  border-l-4 {!! $styles !!}">
            <div class="flex items-center w-11/12 py-3 pl-4 {!! $styles2 !!}">
                <div>
                    {!! $icon !!}
                </div>
                <p class="inline-block ml-2 mr-4 text-sm font-medium align-middle font-poppins">
                    {{ $message }}
                </p>
            </div>
            <button @click="showAlert = false"
                class="px-4 overflow-hidden text-xl font-medium bg-transparent font-poppins">x
            </button>
        </div>
    </div>
</div>
