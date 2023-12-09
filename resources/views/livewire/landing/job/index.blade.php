<div>

    <div class="px-6 py-20 lg:px-20 xl:px-36">
        <h1 class="font-semibold uppercase text-3xl lg:text-3xl py-6">LOWONGAN PEKERJAAN</h1>
        <form class="flex mb-4 mt-6 w-full">
            <label class="hidden" for="search-form">Cari</label>
            <input type="text" wire:model.live="search" placeholder="Cari..." class="bg-slate-100 border-2 focus:outline-blue-600 p-2 rounded-l-xl w-full" placeholder="Cari"
                type="text">
        </form>
        @if ($jobs->where('deleted_at', null)->isEmpty())
            <div class="text-gray-600 h-screen mt-24 text-center">
                <h1 class="text-2xl lg:text-3xl font-semibold mb-2">Maaf, saat ini kami tidak memiliki lowongan pekerjaan
                    yang tersedia.</h1>
                <h3 class="text-lg lg:text-xl">Terima kasih telah berkunjung ke website kami.</h3>
            </div>
        @else
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3 justify-evenly">
                @foreach ($jobs as $job)
                    <div
                        class="flex flex-col rounded-sm justify-between dark:bg-neutral-700 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] w-full ">
                        <div class="flex flex-col justify-start flex-wrap p-6">
                            <img class="rounded-lg mb-2 object-cover object-top w-full h-48"
                                src="{{ asset('storage/' . $job->image) }}">
                            <h5 class="mb-4 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                                {{ $job->position }}</h5>
                            <div class="flex items-center mb-2">
                                <i class="fa-solid fa-location-dot fa-lg mr-4"></i>
                                <p class="text-neutral-600 dark:text-neutral-200">Penempatan : {{ $job->jobcompany->name }}
                                </p>
                            </div>
                            <div class="flex items-center mb-2">
                                <i class="fa-solid fa-user-graduate fa-lg mr-3"></i>
                                <p class="text-neutral-600 dark:text-neutral-200">Pendidikan: {{ $job->jobeducation->name }}
                                </p>
                            </div>
                            <div class="flex items-baseline mb-2">
                                <i class="fa-solid fa-map-location-dot fa-lg mr-3"></i>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    Alamat: {{ $job->jobcompany->address }}
                                </p>
                            </div>
                            <div class="flex items-baseline">
                                <i class="fa-solid fa-layer-group fa-lg mr-3"></i>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    Jobdesk: {{ $job->jobdesk }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col inset-y-6 mx-6 mb-6">
                            <a wire:navigate href="/jobs/{{ $job->id }}"><button
                                    class="flex justify-center w-full rounded-md bg-blue-600 p-2 text-white hover:bg-blue-800 mb-4 mt-auto">
                                    Detail
                                </button></a>
                            <p class="text-xs text-neutral-500 dark:text-neutral-300">
                                {{ $job->created_at }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
