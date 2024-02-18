{{-- <div>
    <div class="flex flex-col lg:flex-row  shadow-lg p-6 pt-28" x-data="{ zoomed: false, mouseX: 0, mouseY: 0, imageWidth: 0, imageHeight: 0, showModal: false, modalImage: '' }"
        x-on:mousemove="mouseX = $event.clientX; mouseY = $event.clientY">
        <!-- Gambar di samping kiri -->
        <div class="lg:w-1/3 mb-4 lg:mb-0 relative overflow-hidden" x-on:mouseleave="zoomed = false"
            x-ref="imageContainer">
            @if ($job->image)
                <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->position }}"
                    class="w-full h-auto  transition-transform duration-300 transform-gpu cursor-pointer"
                    :class="{ 'scale-150 cursor-pointer': zoomed }"
                    x-on:mouseover="zoomed = true; imageWidth = $refs.imageContainer.clientWidth; imageHeight = $refs.imageContainer.clientHeight;"
                    x-bind:style="'transform-origin: ' + ((mouseX - $refs.imageContainer.getBoundingClientRect().left) / imageWidth) *
                    100
                        +
                        '% ' + ((mouseY - $refs.imageContainer.getBoundingClientRect().top) / imageHeight) * 100 + '%;'"
                    x-on:click="
                showModal = true;
                modalImage = '{{ asset('storage/' . $job->image) }}';
            ">
            @else
                <img src="/images/hrd/job/default.jpg" alt="{{ $job->position }}"
                    class="w-full h-auto  transition-transform duration-300 transform-gpu cursor-pointer"
                    :class="{ 'scale-150 cursor-pointer': zoomed }"
                    x-on:mouseover="zoomed = true; imageWidth = $refs.imageContainer.clientWidth; imageHeight = $refs.imageContainer.clientHeight;"
                    x-bind:style="'transform-origin: ' + ((mouseX - $refs.imageContainer.getBoundingClientRect().left) / imageWidth) *
                    100
                        +
                        '% ' + ((mouseY - $refs.imageContainer.getBoundingClientRect().top) / imageHeight) * 100 + '%;'"
                    x-on:click="
        showModal = true;
        modalImage = '/images/hrd/job/default.jpg';
    ">
            @endif
        </div>
        <!-- Detail informasi di samping kanan -->
        <div class="lg:w-2/3 lg:pl-6">
            <h2 class="text-3xl font-bold mb-2 text-gray-800">Posisi Pekerjaan</h2>
            <p class="text-gray-600 mb-2"><span class="font-semibold">Perusahaan:</span> Nama Perusahaan</p>
            <p class="text-gray-600 mb-2"><span class="font-semibold">Alamat:</span> Alamat Perusahaan</p>
            <p class="text-gray-600 mb-2"><span class="font-semibold">Pendidikan:</span> Tingkat Pendidikan</p>
            <p class="text-gray-600 mb-2"><span class="font-semibold">Jobdesk:</span> Deskripsi Jobdesk</p>
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Deskripsi Pekerjaan:</h3>
                <p class="text-gray-600">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed
                    cursus ante dapibus diam.
                </p>
            </div>
        </div>

        <!-- Modal -->
        <div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-end pb-6"
            x-show="showModal" x-on:click="showModal = false">
            <div class="bg-white rounded-lg p-4 w-2/5 h-5/6">
                <img :src="modalImage" alt="Gambar Modal" class=" w-full h-full p-100">
            </div>
        </div>
    </div>


</div> --}}

<div class="pt-28 pb-16 px-12">
    <div class="bg-slate-50 px-8 py-8  border border-blue-200 shadow-lg">
        <div class="flex flex-col lg:flex-row" x-data="{ zoomed: false, mouseX: 0, mouseY: 0, imageWidth: 0, imageHeight: 0, showModal: false, modalImage: '' }"
            x-on:mousemove="mouseX = $event.clientX; mouseY = $event.clientY">
            <!-- Gambar di samping kiri -->
            <div class="lg:w-1/3 mb-4 lg:mb-0 relative overflow-hidden" x-on:mouseleave="zoomed = false"
                x-ref="imageContainer">
                @if ($job->image)
                    <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->position }}"
                        class="w-full h-auto  transition-transform duration-300 transform-gpu cursor-pointer"
                        :class="{ 'scale-150 cursor-pointer': zoomed }"
                        x-on:mouseover="zoomed = true; imageWidth = $refs.imageContainer.clientWidth; imageHeight = $refs.imageContainer.clientHeight;"
                        x-bind:style="'transform-origin: ' + ((mouseX - $refs.imageContainer.getBoundingClientRect().left) /
                            imageWidth) *
                        100
                            +
                            '% ' + ((mouseY - $refs.imageContainer.getBoundingClientRect().top) / imageHeight) * 100 +
                            '%;'"
                        x-on:click="
            showModal = true;
            modalImage = '{{ asset('storage/' . $job->image) }}';
        ">
                @else
                    <img src="/images/hrd/job/default.jpg" alt="{{ $job->position }}"
                        class="w-full h-auto  transition-transform duration-300 transform-gpu cursor-pointer"
                        :class="{ 'scale-150 cursor-pointer': zoomed }"
                        x-on:mouseover="zoomed = true; imageWidth = $refs.imageContainer.clientWidth; imageHeight = $refs.imageContainer.clientHeight;"
                        x-bind:style="'transform-origin: ' + ((mouseX - $refs.imageContainer.getBoundingClientRect().left) /
                            imageWidth) *
                        100
                            +
                            '% ' + ((mouseY - $refs.imageContainer.getBoundingClientRect().top) / imageHeight) * 100 +
                            '%;'"
                        x-on:click="
    showModal = true;
    modalImage = '/images/hrd/job/default.jpg';
">
                @endif
            </div>
            <!-- Detail informasi di samping kanan -->
            <div class="lg:w-2/3 lg:pl-6">
                <dl class="-my-3 divide-y divide-gray-100 ">
                    <div class="py-2 ">
                        <h2 class="text-3xl font-semibold mb-2 text-blue-800 uppercase">{{ $job->position }}</h2>
                    </div>

                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Perusahaan</dt>
                        <dd class="text-gray-700 sm:col-span-2"> {{ $job->jobcompany->name }}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Alamat</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $job->jobcompany->address }}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Min. Pendidikan</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $job->jobeducation->name }}</dd>
                    </div>
                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Jobdesk</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $job->jobdesk }}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 py-2 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-800">Deskripsi Pekerjaan</dt>
                        <dd class="text-gray-700 sm:col-span-2"> {{ $job->description }}

                        </dd>
                    </div>
                </dl>
            </div>

            <!-- Modal -->
            <div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-end pb-6"
                x-show="showModal" x-on:click="showModal = false">
                <div class="bg-white rounded-lg p-4 w-2/5 h-5/6">
                    <img :src="modalImage" alt="Gambar Modal" class=" w-full h-full p-100">
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-9">
            <a wire:navigate
                class="group relative inline-flex items-center overflow-hidden bg-blue-800 px-6 py-2 text-gray-50 focus:outline-none hover:bg-blue-900  active:bg-blue-900"
                href="/applicant/application/{{ $job->id }}/create">
                <span class="absolute -start-full transition-all group-hover:start-4">
                    <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        fill='#f9fafb'>
                        <path
                            d="M360-600v-80h360v80H360Zm0 120v-80h360v80H360Zm120 320H200h280Zm0 80H240q-50 0-85-35t-35-85v-120h120v-560h600v280l-80 80v-280H320v480h240l-80 80H200v40q0 17 11.5 28.5T240-160h240v80Zm80 0v-123l263-262 123 122L683-80H560Zm300-263-37-37 37 37ZM620-140h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z" />
                    </svg>
                </span>

                <span class="font-semibold transition-all group-hover:ms-4">LAMAR SEKARANG</span>
            </a>
        </div>
    </div>
</div>
