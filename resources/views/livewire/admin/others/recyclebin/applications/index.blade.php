<div>
    <header>
        <nav class="w-full pt-14 lg:py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Tempat Sampah | Data Lamaran</h2>
                </li>
                <li class="justify-center hidden w-full md:flex">
                    <div class="flex items-center py-1.5 px-2 w-2/3 bg-slate-200 rounded-xl">
                        <input wire:model.live="search" type="text" placeholder="Cari ..." class="w-full ml-2 outline-none bg-slate-200">
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
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="flex items-center px-3 py-1 shadow-sm rounded-2xl bg-gray-50">
                            <div class="flex flex-col h-full mr-2">
                                <h6 class="text-sm font-semibold">
                                    {{ Auth::user()->username }}</h6>
                                <span class="text-xs">Admin</span>
                            </div>
                            @if (Auth::user()->applicantdata->photo ?? '')
                                <img class="rounded-full"
                                    src="{{ asset('storage/' . Auth::user()->applicantdata->photo) }}"
                                    width="35px" srcset="">
                            @else
                                <img class="rounded-full" src="/storage/images/applicant/default.jpg" width="35px"
                                    srcset="">
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
            <div class="flex justify-center m-4 md:hidden">
                <div class="flex items-center py-1.5 px-2 w-full sm:w-2/3 bg-slate-200 rounded-xl ">
                    <input wire:model.live="search" type="text" placeholder="Cari ..." class="w-full ml-2 outline-none bg-slate-200">
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
    <div class="mx-4 lg:mx-10">
        @if ($applications->isEmpty())
            <div class="mt-24 text-gray-600">
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Data lamaran di tempat sampah tidak
                    tersedia.
                </h1>
            </div>
        @else
            <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                <thead class="bg-gray-200 border-b border-gray-200">
                    <tr class="text-center text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Pelamar</th>
                        <th class="px-4 py-3">Detail</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($applications as $application)
                        <tr>
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">
                                @if (isset($application->applicant->applicantdata->full_name))
                                    <a wire:navigate href="/hrd/applications/applicant/{{ $application->id }}/applicantdata"
                                        class="text-blue-600 hover:underline">{{ $application->applicant->applicantdata->full_name }}</a>
                                @else
                                    {{ $application->applicant->email }}
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                Detail
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex flex-col justify-start gap-2 lg:flex-row">
                                    <a wire:navigate href="/admin/others/recyclebin/applications/{{ $application->id }}/restore"
                                        class="font-medium text-blue-600 hover:underline">Pulihkan</a>
                                    <form action="/admin/others/recyclebin/applications/{{ $application->id }}/force"
                                        method="post" class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="font-medium text-red-600 hover:underline"
                                            onclick="return confirm('Anda yakin hapus secara permanen?')">Hapus
                                            Permanen</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{-- <div class="absolute flex items-center justify-center w-full h-screen bg-black opacity-60 ">
            <div class="p-5 bg-white rounded-md">
                <div class="w-1/2 p-6 mx-auto mt-10 text-gray-600 bg-white rounded-md shadow-md">
                    <div class="flex items-center justify-center mb-4">
                        <img src="{{asset('storage/'. $applications->applicant->applicantdata->photo)}}" alt="Foto" class="object-cover w-32 h-32 rounded-full">
                    </div>
                    <div class="mb-4">
                        <label class="text-gray-600">Nomor KTP:</label>
                        <p class="font-semibold">{{$applications->applicant->applicantdata->ktp_number}}</p>
                    </div>
                    <div class="mb-4">
                        <label class="text-gray-600">Nama Lengkap:</label>
                        <p class="font-semibold">{{$applications->applicant->applicantdata->full_name}}</p>
                    </div>
                    <div class="mb-4">
                        <label class="text-gray-600">Tempat Lahir:</label>
                        <p class="font-semibold">{{$applications->applicant->applicantdata->place_of_birth}}</p>
                    </div>
                    <div class="mb-4">
                        <label class="text-gray-600">Tanggal Lahir:</label>
                        <p class="font-semibold">{{$applications->applicant->applicantdata->date_of_birth}}</p>
                    </div>
                    <div class="mb-4">
                        <label class="text-gray-600">Jenis Kelamin:</label>
                        <p class="font-semibold">{{$applications->applicant->applicantdata->gender}}</p>
                    </div>
                    <div class="mb-4">
                        <label class="text-gray-600">Status Pernikahan:</label>
                        <p class="font-semibold">{{$applications->applicant->applicantdata->marital_status}}</p>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
    {{-- paginate --}}
    {{-- <div class="flex justify-center my-4">
        {{ $applications->appends(request()->all())->links() }}
    </div> --}}
    <script>
        const modal = document.querySelector('.modal');

        const showModal = document.querySelector('.show-modal');
        const closeModal = document.querySelector('.close-modal');

        showModal.addEventListener('click', function() {
            modal.classList.remove('hidden')
        })
        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden')
        })
    </script>
</div>
