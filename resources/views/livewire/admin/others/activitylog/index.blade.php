<div>
    <header>
        <nav class="w-full pt-14 lg:py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Log Aktivitas</h2>
                </li>
                <li class="justify-center hidden w-full md:flex">
                    <div class="flex items-center py-1.5 px-2 w-2/3 bg-slate-200 rounded-xl">
                        <input wire:model.live="search" type="text" placeholder="Cari ..."
                            class="w-full ml-2 outline-none bg-slate-200">
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
                                    src="{{ asset('storage/' . Auth::user()->applicantdata->photo) }}" width="35px"
                                    srcset="">
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
                    <input wire:model.live="search" type="text" placeholder="Cari ..."
                        class="w-full ml-2 outline-none bg-slate-200">
                    <svg class="" width="24px" height="24px" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </nav>
    </header>
    <div class="mx-4 lg:ml-8">
        @if (session()->has('success'))
            <p id="alert" class="px-6 py-4 text-success-700 bg-success-200 rounded-lg">{{ session('success') }}</p>
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
        <a wire:navigate href="/admin/others" class="flex items-center mb-4 w-min hover:underline">
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
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr class="text-left text-gray-600">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Log</th>
                    <th class="py-3 px-4">Peran</th>
                    <th class="py-3 px-4">Username</th>
                    <th class="py-3 px-4">Aktivitas</th>
                    <th class="py-3 px-4">Subjek</th>
                    <th class="py-3 px-4">Informasi Tambahan</th>
                    <th class="py-3 px-4">Waktu Dibuat</th>
                    <th class="py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($activitylogs as $activitylog)
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4">{{ $activitylog->log_name }}</td>
                        <?php
                        if ($activitylog->causer_type) {
                            $model = app($activitylog->causer_type);
                            $data = $model::where('id', '=', $activitylog->causer_id)->first();
                        }
                        ?>
                        <td class="py-3 px-4"><a wire:navigate
                                href="/admin/others/activitylog/{{ $activitylog->id }}/role"
                                class="text-blue-600 hover:underline">
                                @if ($activitylog->causer_type == 'App\Models\User')
                                    @if ($data->role == 'applicant')
                                        Pelamar
                                    @elseif ($data->role == 'hrd')
                                        HRD
                                    @elseif ($data->role == 'admin')
                                        Admin
                                    @endif
                                @else
                                    NULL
                                @endif
                            </a></td>
                        <td class="py-3 px-4">
                            @if ($activitylog->causer_type)
                                {{ $data->username }}
                            @else
                                NULL
                            @endif
                        </td>
                        <td class="py-3 px-4">{{ $activitylog->event }}</td>
                        <td class="py-3 px-4"><a wire:navigate
                                href="/admin/others/activitylog/{{ $activitylog->id }}/subject"
                                class="text-blue-600 hover:underline">
                                @if ($activitylog->subject_type == 'App\Models\Admin')
                                    Admin
                                @elseif ($activitylog->subject_type == 'App\Models\Applicant')
                                    Pelamar
                                @elseif ($activitylog->subject_type == 'App\Models\ApplicantContact')
                                    Data Kontak Pelamar
                                @elseif ($activitylog->subject_type == 'App\Models\ApplicantData')
                                    Data Pribadi Pelamar
                                @elseif ($activitylog->subject_type == 'App\Models\ApplicantEducationalBackground')
                                    Data Pendidikan Pelamar
                                @elseif ($activitylog->subject_type == 'App\Models\ApplicantOrganizationalExperience')
                                    Data Pengalaman Organisasi Pelamar
                                @elseif ($activitylog->subject_type == 'App\Models\ApplicantWorkExperience')
                                    Data Pengalaman Kerja Pelamar
                                @elseif ($activitylog->subject_type == 'App\Models\Application')
                                    Lamaran
                                @elseif ($activitylog->subject_type == 'App\Models\Hrd')
                                    HRD
                                @elseif ($activitylog->subject_type == 'App\Models\Job')
                                    Lowongan
                                @elseif ($activitylog->subject_type == 'App\Models\JobCompany')
                                    Perusahaan
                                @elseif ($activitylog->subject_type == 'App\Models\JobCompanyAddress')
                                    Alamat Perusahaan
                                @elseif ($activitylog->subject_type == 'App\Models\JobEducation')
                                    Pendidikan
                                @elseif ($activitylog->subject_type == 'App\Models\User')
                                    <?php
                                    if ($activitylog->subject_type) {
                                        $model = app($activitylog->subject_type);
                                        $data = $model::where('id', '=', $activitylog->subject_id)->first();
                                    }
                                    ?>
                                    @if ($data->role == 'applicant')
                                        Pelamar
                                    @elseif ($data->role == 'hrd')
                                        HRD
                                    @elseif ($data->role == 'admin')
                                        Admin
                                    @endif
                                @else
                                    Null
                                @endif
                            </a></td>
                        <td class="py-3 px-4"><a wire:navigate
                                href="/admin/others/activitylog/{{ $activitylog->id }}/addinfo"
                                class="text-blue-600 hover:underline">Detail</a></td>
                        <td class="py-3 px-4">{{ $activitylog->created_at }}</td>
                        <td class="py-3 px-4">
                            <button type="submit" wire:click="delete({{ $activitylog->id }})" wire:confirm="Anda yakin?" class="inline-block px-2 py-1 text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
