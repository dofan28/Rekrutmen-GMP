<div>

    <div class="flex justify-center items-end h-80 bg-cover bg-center"
        style="background-image: url('/images/landing/jobs.png');">
        <div class="flex flex-col justify-between w-full h-3/5 text-center ">
            <div>
                <h1 class="text-5xl font-bold font-montserrat text-gray-100">LOWONGAN KERJA</h1>
                <p class="font-poppins mt-3 text-xl font-semibold text-gray-100">Temukan pilihan karier anda di PT. Graha
                    Mutu Persada
                </p>
            </div>
            <div class="relative top-4 px-32">
                <div class="flex items-center shadow-md p-2 sticky w-full h-14 bg-gray-50">
                    <div class="flex justify-center items-center bg-blue-800 h-full w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"
                                fill="#f3f4f6" />
                        </svg>
                    </div>
                    <input wire:model.live="search" type="text"
                        class="bg-gray-100 leading-tight border-none h-full font-poppins w-full"
                        placeholder="Cari lowongan kerja ...">
                </div>

            </div>
        </div>
    </div>


    <!-- start: section-content -->
    <div
        class="flex lg:flex-row  md:flex-col sm:flex-col justify-center w-full lg:flex-wrap px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20 space-x-5">

        @forelse ($jobs as $job)
            <div wire:key='{{ $job->id }}'
                class="flex bg-gray-100 transition mb-6 hover:shadow-xl lg:w-[47%]  md:w-full sm:w-full">
                <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
                    <time datetime="2022-10-10"
                        class="flex items-center justify-between gap-4 text-xs font-bold uppercase text-gray-900">
                        <span>{{ $job->created_at->format('d F') }}</span>
                        <span class="w-px flex-1 bg-gray-900/10"></span>
                        <span>{{ $job->created_at->format('Y') }}</span>
                    </time>
                </div>

                <div class="hidden sm:block sm:basis-56">
                    @if ($job->image)
                        <img alt="{{ $job->position }}" src="{{ asset('storage/' . $job->image) }}"
                            class="aspect-square h-full w-full object-cover" />
                    @else
                        <img alt="{{ $job->position }}" src="/images/hrd/job/default.jpg"
                            class="aspect-square h-full w-full object-cover" />
                    @endif
                </div>

                <div class="flex flex-1 flex-col justify-between b">
                    <div class="border-s border-gray-800/10 p-4 sm:border-l-transparent sm:p-6">
                        <a href="/jobs/{{ $job->id }}">
                            <h3 class="font-semibold text-lg font-montserrat uppercase text-gray-800">
                                {{ $job->position }}
                            </h3>
                        </a>
                        <div class="flex mt-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                    width="24">
                                    <path
                                        d="M120-120v-560h160v-160h400v320h160v400H520v-160h-80v160H120Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 320h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h80v-80h-80v80Zm0-160h80v-80h-80v80Z"
                                        fill="#1f2937" />
                                </svg>
                            </div>

                            <p class="text-gray-800 ml-2 font-poppins">{{ $job->jobcompany->name }}</p>
                        </div>
                        <div class="flex mt-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                    width="24">
                                    <path
                                        d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z"
                                        fill="#1f2937" />
                                </svg>
                            </div>

                            <p class="text-gray-800 ml-2 font-poppins">{{ $job->jobeducation->name }}</p>
                        </div>
                        <div class="flex mt-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                    width="24">
                                    <path
                                        d="M80-120v-600h240v-160h320v160h240v600H80Zm80-80h640v-440H160v440Zm240-520h160v-80H400v80ZM160-200v-440 440Z"
                                        fill="#1f2937" />
                                </svg>
                            </div>

                            <p class="text-gray-800 ml-2 font-poppins">{{ $job->jobdesk }}</p>
                        </div>
                        @if (strlen($job->description) >= 64)
                            <p class="mt-2 line-clamp-2 text-sm/relaxed text-gray-800 font-poppins">
                                {!! $job->description !!}
                            </p>
                            <a class="text-blue-800 hover:text-blue-900 hover:underline italic"
                                href="/jobs/{{ $job->id }}">Lihat
                                Selengkapnya</a>
                        @else
                            <p class="mt-2 line-clamp-2 text-sm/relaxed text-gray-800 font-poppins">
                                {!! $job->description !!}
                            </p>
                        @endif
                    </div>
                    <div class="sm:flex sm:items-end sm:justify-end">
                        <a wire:navigate
                            class="group relative inline-flex items-center overflow-hidden bg-blue-800 px-6 py-2 text-gray-50 focus:outline-none hover:bg-blue-900  active:bg-blue-900"
                            href="/applicant/application/{{ $job->id }}/create">
                            <span class="absolute -start-full transition-all group-hover:start-4">
                                <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -960 960 960" fill='#f9fafb'>
                                    <path
                                        d="M360-600v-80h360v80H360Zm0 120v-80h360v80H360Zm120 320H200h280Zm0 80H240q-50 0-85-35t-35-85v-120h120v-560h600v280l-80 80v-280H320v480h240l-80 80H200v40q0 17 11.5 28.5T240-160h240v80Zm80 0v-123l263-262 123 122L683-80H560Zm300-263-37-37 37 37ZM620-140h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z" />
                                </svg>
                            </span>

                            <span class="font-semibold transition-all group-hover:ms-4">LAMAR SEKARANG</span>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-gray-600 mt-12 text-center">
                <h1 class="text-2xl lg:text-3xl font-semibold mb-2">Maaf, saat ini kami tidak memiliki lowongan
                    pekerjaan
                    yang tersedia.</h1>
                <h3 class="text-lg lg:text-xl">Terima kasih atas minat Anda.</h3>
            </div>
        @endforelse


    </div>
    <!-- end: section-content -->

</div>
