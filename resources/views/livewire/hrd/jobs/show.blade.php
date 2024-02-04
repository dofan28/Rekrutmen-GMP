<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Detail Data Lowongan Kerja</h2>
    </div>
    <div x-data="{ zoomed: false, mouseX: 0, mouseY: 0, imageWidth: 0, imageHeight: 0, showModal: false, modalImage: '' }" x-on:mousemove="mouseX = $event.clientX; mouseY = $event.clientY"
        class="mt-4 w-full p-4 bg-gray-50 border border-blue-200">
        <a wire:navigate href="/hrd/jobs" class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 -960 960 960" class="w-5 h-5">
                <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
            </svg>
            <span class="text-sm font-poppins">Kembali</span>
        </a>
        <div class="flex lg:flex-row md:flex-row sm:flex-col mt-2">
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
                        <h2 class="text-3xl font-semibold mb-2 text-gray-800">{{ $job->position }}</h2>
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
                        <dd class="text-gray-700 sm:col-span-2"> {!! $job->description !!}

                        </dd>
                    </div>
                </dl>
            </div>
        </div>

    </div>


</div>
