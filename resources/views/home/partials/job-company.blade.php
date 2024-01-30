<div>
    <div class="relative max-w-7xl mx-auto">
        <!-- section header -->
        <div class="text-center">
            <h2 class="text-3xl tracking-wide font-bold text-gray-800 sm:text-4xl">DAFTAR LOWONGAN KERJA <br>DI
                BEBERAPA CABANG PERUSAHAAN KAMI</h2>
            <p class="mt-3 max-w-4xl mx-auto text-xl text-gray-800 sm:mt-4">
                Telusuri ragam peluang karier menarik di setiap cabang perusahaan kami! Temukan tempat di tim yang
                penuh semangat untuk pertumbuhan dan kolaborasi
            </p>
        </div>

        <!-- start: section-content -->
        <div id="#company-entity">
            <div class="flex flex-wrap gap-10 justify-center pt-14 font-poppins">
                @forelse ($jobcompanies as $jobcompany)
                    <div class="flex w-5/12 flex-col items-center p-4 text-center bg-white shadow-md">
                        <div class="flex items-center justify-center">
                            <i class="p-3 text-5xl bg-blue-800 fa-solid fa-building" style="color: #ffffff;"></i>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-800">{{ $jobcompany->name }}</p>
                        </div>
                        <a wire:navigate
                            class="w-full px-4 py-2 mt-4 text-gray-800 bg-neutral-100 hover:bg-blue-800 hover:text-white"
                            href="/jobcompany/{{ $jobcompany->id }}">
                            {{ $jobcompany->job->where('status', 1)->count() }} Lowongan Kerja Tersedia

                        </a>
                    </div>
                @empty
                    <div class="h-screen mt-24 text-center text-gray-800 font-poppins">
                        <h1 class="mb-2 text-2xl font-semibold lg:text-3xl">Maaf, saat ini di entitas perusahaan
                            kami
                            tidak
                            memiliki
                            lowongan kerja yang tersedia.</h1>
                        <h3 class="text-lg lg:text-xl">Terima kasih telah berkunjung ke website kami.</h3>
                    </div>
                @endforelse
            </div>
        </div>
        <!-- end: section-content -->

    </div>
</div>
