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
                    <dt class="font-medium text-gray-900">Alamat Lengkap</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantcontact->getFullAddress()}}
                    </dd>
                </div>

                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Email</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantcontact->email}}
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Nomor Telepon</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantcontact->phone}}
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">LinkedIn</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantcontact->linkedin}}
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Facebook</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantcontact->facebook}}
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Facebook</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{$applicantcontact->instagram}}
                    </dd>
                </div>


            </dl>
        </div>
    </div>

</div>
