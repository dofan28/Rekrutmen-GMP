<div>
    <div class="relative max-w-7xl mx-auto">
        <!-- section header -->
        <div class="text-center">
            <h2 class="text-3xl tracking-wide font-bold text-gray-800 sm:text-4xl">TEMUKAN PEKERJAAN ANDA DAN <br>
                BERGABUNGLAH BERSAMA KAMI</h2>
            <p class="mt-3 max-w-4xl mx-auto text-xl text-gray-800 sm:mt-4">
                Menjadi bagian dari PT Graha Mutu Persada berarti menerapkan nilai DETAIL (Dakwah, Excellent
                Service, Teamwork, Attitude, Integrity, & Loyalty) dalam aksi. Berikut daftar peluang karier yang
                kami sediakan untuk Anda.
            </p>
        </div>

        <!-- start: section-content -->
        <div
            class="flex lg:flex-row  md:flex-col sm:flex-col justify-center w-full lg:flex-wrap px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20 space-x-5">
            @forelse ($jobs as $job)
                <div class="flex bg-gray-100 transition mb-6  hover:shadow-xl lg:w-[47%] md:w-full sm:w-full">
                    <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
                        <time datetime="2022-10-10"
                            class="flex items-center justify-between gap-4 text-xs font-bold uppercase text-gray-900">
                            <span>{{ $job->created_at->format('d F') }}</span>
                            <span class="w-px flex-1 bg-gray-900/10"></span>
                            <span>{{ $job->created_at->format('Y') }}</span>
                        </time>
                    </div>

                    <div class="hidden sm:block sm:basis-56">
                        <img alt="{{ $job->position }}" src="/images/hrd/job/default.jpg"
                            class="aspect-square h-full w-full object-cover" />
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
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                        viewBox="0 -960 960 960" width="24">
                                        <path
                                            d="M120-120v-560h160v-160h400v320h160v400H520v-160h-80v160H120Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 320h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h80v-80h-80v80Zm0-160h80v-80h-80v80Z"
                                            fill="#1f2937" />
                                    </svg>
                                </div>

                                <p class="text-gray-800 ml-2 font-poppins">{{ $job->jobcompany->name }}</p>
                            </div>
                            <div class="flex mt-2">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                        viewBox="0 -960 960 960" width="24">
                                        <path
                                            d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z"
                                            fill="#1f2937" />
                                    </svg>
                                </div>

                                <p class="text-gray-800 ml-2 font-poppins">{{ $job->jobeducation->name }}</p>
                            </div>
                            <div class="flex mt-2">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                        viewBox="0 -960 960 960" width="24">
                                        <path
                                            d="M80-120v-600h240v-160h320v160h240v600H80Zm80-80h640v-440H160v440Zm240-520h160v-80H400v80ZM160-200v-440 440Z"
                                            fill="#1f2937" />
                                    </svg>
                                </div>

                                <p class="text-gray-800 ml-2 font-poppins">{{ $job->jobdesk }}</p>
                            </div>
                            <p class="mt-2 line-clamp-2 text-sm/relaxed text-gray-800 font-poppins">
                                {!! $job->description !!}
                            </p>
                        </div>
                        <div class="sm:flex sm:items-end sm:justify-end">
                            <a href="/jobs/{{ $job->id }}"
                                class="block bg-blue-800 px-5 py-3 font-poppins text-center text-xs font-bold text-gray-100 transition hover:bg-blue-900">
                                LAMAR SEKARANG
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
            @if ($jobs->count() >= 4)
                <a href="/jobs"
                    class="relative inline-flex items-center text-blue-800 font-semibold py-2 px-4  transition duration-300 ease-in-out transform hover:text-blue-900 hover:scale-105 hover:underline border-transparent border">
                    <span class="mr-1">Lihat Lowongan Kerja Lainnya</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                    <div
                        class="box-content absolute top-0 left-0 w-full h-full opacity-0 transition duration-300 ease-in-out pointer-events-none">
                    </div>
                </a>
            @endif

        </div>

    </div>
    <!-- end: section-content -->
</d>
