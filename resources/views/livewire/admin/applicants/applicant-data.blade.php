<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Detail Data Pribadi Pelamar</h2>
    </div>
    <!-- component -->
    <div class="mt-4 w-full p-4 bg-gray-50 border border-gray-100">
        <a wire:navigate href="/admin/applicants" class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 -960 960 960" class="w-5 h-5">
                <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
            </svg>
            <span class="text-sm font-poppins">Kembali</span>
        </a>
        <div class="flow-root mt-6">
            <dl class="-my-3 divide-y divide-gray-100">
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">NIK</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantdata->ktp_number}}
                    </dd>
                </div>

                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Nama Lengkap</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantdata->full_name}}
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Tempat dan Tangal Lahir</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantdata->getPlaceDateBirth()}}
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Jenis Kelamin</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantdata->gender}}
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Status Perkawinan</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantdata->marital_status}}
                    </dd>
                </div>


            </dl>
        </div>
    </div>

</div>
