<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Detail Data Lamaran</h2>
    </div>
    <div class="mt-4 w-full p-4 bg-gray-50 border border-gray-100">
        <a wire:navigate href="/admin/applications" class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 -960 960 960" class="w-5 h-5">
                <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
            </svg>
            <span class="text-sm font-poppins">Kembali</span>
        </a>
        <div class="flow-root mt-6">
            <dl class="-my-3 divide-y divide-gray-100">
              <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Surat Lamaran</dt>
                <dd class="text-gray-700 sm:col-span-2">@if ($application->applicant_letter)
                    {{ $application->applicant_letter }}
                @else
                    Tidak ada
                @endif</dd>
              </div>

              <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Surat Perusahaan</dt>
                <dd class="text-gray-700 sm:col-span-2">@if ($application->company_letter)
                    {{ $application->company_letter }}
                @else
                    Tidak ada
                @endif</dd>
              </div>

              <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Status</dt>
                <dd class="text-gray-700 sm:col-span-2"> @if ($application->status == -1)
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-yellow-50 px-2 py-1 text-xs font-semibold text-yellow-600">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                            class="h-4 w-4">
                            <path
                                d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"
                                fill='#ca8a04' />
                        </svg>
                        Menunggu
                    </span>
                @elseif ($application->status == 0)
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 -960 960 960" class="h-4 w-4">
                            <path
                                d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" fill='#dc2626'/>
                        </svg>
                        Ditolak
                    </span>
                @elseif ($application->status == 1)
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                            class="h-4 w-4">
                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"
                                fill='#16a34a' />
                        </svg>
                        Diterima
                    </span>
                @endif</dd>
              </div>
            </dl>
          </div>
    </div>

</div>
