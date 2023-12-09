<div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Detail Data Pelamar</h2>
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
                                    {{ Auth::guard('hrd')->user()->full_name ?? '' }}</h6>
                                <span class="text-xs">HRD</span>
                            </div>
                            @if (Auth::guard('hrd')->user()->photo != "images/hrd/profile/default.jpg" ?? '')
                                <img class="rounded-full" src="{{ asset('storage/' . Auth::guard('hrd')->user()->photo) }}"
                                    width="35px" srcset="">
                            @else
                                <img class="rounded-full" src="/images/hrd/profile/default.jpg" width="35px"
                                    srcset="">
                            @endif
                        </div>
                    </div>
                </li>
            </ul>

        </nav>
    </header>
    <div class="mt-10 w-11/12 lg:w-3/4 mx-auto bg-white p-6 rounded-md shadow-md text-gray-600">
        <a wire:navigate href="/hrd/applications" class="flex w-min items-center mb-4 hover:underline">
            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 52 52"
                enable-background="new 0 0 52 52" xml:space="preserve">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0 L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29 h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z">
                    </path>
                </g>
            </svg>
            <p class="ml-2 text-sm font-medium">Kembali</p>
        </a>
        <h2 class="text-2xl font-bold">Data Pribadi</h2>
        <div class="flex items-center justify-center mb-4">
            <img src="{{ asset('storage/' . $application->applicant->applicantdata->photo) }}" alt="Foto"
                class="w-32 h-32 rounded-full object-cover">
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Nomor KTP:</label>
            <p class="font-semibold">{{ $application->applicant->applicantdata->ktp_number }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Nama Lengkap:</label>
            <p class="font-semibold">{{ $application->applicant->applicantdata->full_name }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Tempat Lahir:</label>
            <p class="font-semibold">{{ $application->applicant->applicantdata->place_of_birth }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Tanggal Lahir:</label>
            <p class="font-semibold">{{ $application->applicant->applicantdata->date_of_birth }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Jenis Kelamin:</label>
            <p class="font-semibold">{{ $application->applicant->applicantdata->gender }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Status Pernikahan:</label>
            <p class="font-semibold">{{ $application->applicant->applicantdata->marital_status }}</p>
        </div>
        <hr>
        <h2 class="text-2xl font-bold">Kontak</h2>
        <div class="mb-4">
            <label class="text-gray-600">Jalan:</label>
            <p class="font-semibold">{{ $application->applicant->contact->street }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Desa / Kecamatan:</label>
            <p class="font-semibold">{{ $application->applicant->contact->subdistrict }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Kota:</label>
            <p class="font-semibold">{{ $application->applicant->contact->city }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Kode Pos:</label>
            <p class="font-semibold">{{ $application->applicant->contact->postal_code }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Email:</label>
            <p class="font-semibold">{{ $application->applicant->contact->email }}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Nomor Telepon: </label>
            <p class="font-semibold">{{ $application->applicant->contact->phone }}</p>
        </div>
        @if ($application->applicant->contact->linkedin)
            <div class="mb-4">
                <label class="text-gray-600">LinkedIn: </label>
                <p class="font-semibold">{{ $application->applicant->contact->linkedin }}</p>
            </div>
        @endif
        @if ($application->applicant->contact->facebook)
            <div class="mb-4">
                <label class="text-gray-600">Facebook: </label>
                <p class="font-semibold">{{ $application->applicant->contact->facebook }}</p>
            </div>
        @endif
        @if ($application->applicant->contact->instagram)
            <div class="mb-4">
                <label class="text-gray-600">Instagram: </label>
                <p class="font-semibold">{{ $application->applicant->contact->instagram }}</p>
            </div>
        @endif
        <hr>
        <h2 class="text-2xl font-bold">Riwayat Pendidikan</h2>
        @if (!$application->applicant->educationalbackground->isEmpty())
            @foreach ($application->applicant->educationalbackground as $key => $educationalbackground)
            <h2 class="text-xl font-semibold">Pendidikan {{ $key + 1 }}</h2>
                <div class="mb-4">
                    <label class="text-gray-600">Institusi: </label>
                    <p class="font-semibold">{{ $educationalbackground->institution }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Jurusan: </label>
                    <p class="font-semibold">{{ $educationalbackground->major }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Gelar: </label>
                    <p class="font-semibold">{{ $educationalbackground->title }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Tanggal Mulai: </label>
                    <p class="font-semibold">{{ $educationalbackground->start_date }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Tangal Selesai: </label>
                    @if($educationalbackground->end_date)
                    <p class="font-semibold">{{ $educationalbackground->end_date }}</p>
                    @else
                    <p class="font-semibold">-</p>
                    @endif
                </div>
            @endforeach
        @endif
        <hr>
        <h2 class="text-2xl font-bold">Pengalaman Kerja</h2>
        @if (!$application->applicant->workexperience->isEmpty())
            @foreach ($application->applicant->workexperience as $key => $workexperience)
            <h2 class="text-xl font-semibold">Pengalaman Kerja {{ $key + 1 }}</h2>
                <div class="mb-4">
                    <label class="text-gray-600">Perusahaan: </label>
                    <p class="font-semibold">{{ $workexperience->company }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Posisi: </label>
                    <p class="font-semibold">{{ $workexperience->position }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Gaji Terakhir: </label>
                    <p class="font-semibold">{{ $workexperience->last_salary }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Deskripsi Pekerjaan: </label>
                    <p class="font-semibold">{{ $workexperience->start_date }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Tanggal Mulai </label>
                    <p class="font-semibold">{{ $workexperience->start_date }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Tangal Selesai: </label>
                    @if($workexperience->end_date)
                    <p class="font-semibold">{{ $workexperience->end_date }}</p>
                    @else
                    <p class="font-semibold">-</p>
                    @endif
                </div>
            @endforeach
        @endif
        <hr>
        <h2 class="text-2xl font-bold">Pengalaman Organisasi</h2>
        @if (!$application->applicant->organizationalexperience->isEmpty())
            @foreach ($application->applicant->organizationalexperience as $key => $organizationalexperience)
            <h2 class="text-xl font-semibold">Pendidikan {{ $key + 1 }}</h2>
                <div class="mb-4">
                    <label class="text-gray-600">Nama Organisasi: </label>
                    <p class="font-semibold">{{ $organizationalexperience->organizational_name }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Posisi: </label>
                    <p class="font-semibold">{{ $organizationalexperience->position }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-600">Deskripsi Organisasi: </label>
                    <p class="font-semibold">{!!$organizationalexperience->organizational_description !!}</p>
                </div>
              
            @endforeach
        @endif

    </div>
</div>