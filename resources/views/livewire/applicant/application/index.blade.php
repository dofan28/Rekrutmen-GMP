<div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Lamaran Saya</h2>
                </li>
                <li class="justify-center hidden w-full md:flex">
                    <div class="flex items-center py-1.5 px-2 w-2/3 bg-slate-200 rounded-xl">
                        <input  wire:model.live="search" type="text" placeholder="Cari ..." class="w-full ml-2 outline-none bg-slate-200">
                        <svg class="" width="24px" height="24px" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
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
            <div class="flex justify-center m-4 md:hidden">
                <div class="flex items-center py-1.5 px-2 w-full sm:w-2/3 bg-slate-200 rounded-xl ">
                    <input  wire:model.live="search" type="text" placeholder="Cari ..." class="w-full ml-2 outline-none bg-slate-200">
                    <svg class="" width="24px" height="24px" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </nav>
    </header>

    @if (session()->has('success'))
        <p id="alert" class="px-6 py-4 rounded-lg text-success-700 bg-success-200">{{ session('success') }}</p>
        <script>
            // Menghilangkan alert setelah 3 detik
            setTimeout(function() {
                var alert = document.getElementById('alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif

    @if ($applications->where('deleted_at', null)->isEmpty())
        <div class="flex flex-col items-center justify-center mt-10">
            <div class="mt-24 text-gray-600">
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Lamaran anda belum tersedia</h1>
                <h3 class="text-lg text-center lg:text-xl">Anda belum pernah mengajukan lamaran sama sekali</h3>
            </div>
            @if ($jobs->where('deleted_at', null)->isEmpty())
            @else
                <div class="w-11/12 text-gray-600">
                    <div class="relative overflow-hidden overflow-x-scroll">
                        <div class="flex transition-transform slider ">
                            @foreach ($jobs as $job)
                                <div wire:key="{{ $job->id }}"
                                    class="flex flex-col justify-between flex-shrink-0 w-full mx-4 my-6 transition duration-200 ease-in-out delay-150 rounded-lg shadow-md hover:-translate-y-1 hover:scale-110 lg:w-1/4 md:w-2/4 bg-slate-200 p-7">
                                    <h4 class="text-xl font-semibold text-center text-gray-800 ">
                                        {{ $job->jobcompany->name }}
                                    </h4>
                                    <h4 class="text-xl font-semibold text-center text-gray-800 "> {{ $job->position }}
                                    </h4>
                                    <p class="mt-4 text-base text-justify text-gray-600">{{ $job->jobcompany->address }}
                                    </p>
                                    <p class="mt-2 text-base text-justify text-gray-600">{{ $job->jobdesk }}</p>
                                    <div class="flex justify-center">
                                        <a wire:navigate href="/applicant/jobs/{{ $job->id }}"><button
                                                class="font-semibold text-gray-800 underline hover:text-blue-600">
                                                Selengkapnya...
                                            </button></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endif

        </div>
    @else
        <div class="mx-4 mt-4 lg:mt-10 lg:mx-10">
            <table class="w-full">
                <thead class="bg-gray-200 rounded-md">
                    <tr class="text-center text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Perusahaan</th>
                        <th class="px-4 py-3">Posisi</th>
                        <th class="px-4 py-3" >Detail</th>
                        <th class="px-4 py-3" >Lampiran</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Konfirmasi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($applications as $application)
                        <tr>
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-center">{{ $application->job->jobcompany->name }}</td>
                            <td class="px-4 py-3 text-center">{{ $application->job->position }}</td>
                            <td class="px-4 py-3 text-center"><a wire:navigate href="/applicant/application/{{ $application->id }}/show" class="text-center text-blue-500 underline">Lihat</a></button></td>
                            <td class="px-4 py-3 text-center"><a wire:navigate
                                    href="/applicant/application/applicationletter/{{ $application->id }}"
                                    class="text-center text-blue-500 underline">Surat Lamaran</a></td>
                            <td class="px-4 py-3 text-center">
                                @if ($application->status == -1)
                                    Menunggu
                                @elseif ($application->status == 0)
                                    Ditolak
                                @elseif ($application->status == 1)
                                    <a wire:navigate
                                        href="/applicant/application/applicationletter/{{ $application->id }}"
                                        class="text-center text-blue-500 underline">Diterima</a>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if ($application->confirm == 0 && $application->status > -1)
                                    <a wire:navigate href="/applicant/application/{{ $application->id }}/confirm"
                                        class="px-2 py-1 text-center text-white bg-blue-500 rounded hover:bg-blue-700"
                                        onclick="return confirm('Anda yakin?')">Konfirmasi</a>
                                @elseif ($application->status == -1)
                                    <button class="px-2 py-1 text-center text-white bg-gray-400 rounded"
                                        disabled>Konfirmasi</button>
                                @elseif ($application->confirm == 1)
                                    <i class="fa fa-check-circle"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif
</div>
