<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl tracking-wide font-bold text-gray-800">Surat Lamaran Saya</h2>
    </div>
    @if (session()->has('success'))
        <x-alert type='success' :message="session('success')"></x-alert>
    @endif
    <div class="mt-4 w-full px-12 py-8 bg-gray-50 border border-blue-200">
        <div class="pb-10">
            @if ($application->applicant_letter)
                {!! $application->applicant_letter !!}
            @else
            <p class="text-red-600 font-semibold">Tidak Ada</p>
            @endif
        </div>
        <hr>
        <div>
            <h4 class="text-xl font-semibold py-2">Balasan Surat dari Perusahaan :</h4>
            @if ($application->status == 0 || $application->status == 1)
                @if ($application->company_letter)
                    {{ $application->company_letter }}
                @else
                <p class="text-red-600 font-semibold">Tidak Ada</p>
                @endif
            @else
            <p class="text-yellow-600 font-semibold">Menunggu</p>
            @endif
        </div>
    </div>

</div>
