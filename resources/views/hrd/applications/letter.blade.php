@extends('layouts.dashboard')

@section('content')
<div class="max-w-md p-8 mx-auto bg-white rounded-md shadow-md lg:max-w-lg" >
    <a href="/hrd/applications" class="flex items-center mb-2 w-min">
        <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0 L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29 h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"></path> </g></svg>
        <p class="ml-2 font-medium hover:underline">Kembali</p>
    </a>
    <h3 class="my-2 text-lg font-medium">Data Lamaran</h3>
    <div class="text-justify">
        <p>Nama Pelamar: {{$application->applicant->name}}</p>
        <p>Perusahaan: {{$application->job->jobcompany->name}}</p>
        <p>Posisi: {{$application->job->position}}</p>
        <p>
            Status:
            @if ($application->status == -1)
                Menunggu
                @elseif ($application->status == 0)
                Ditolak
                @elseif ($application->status == 1)
                Diterima
            @endif
        </p>
        <p class="font-medium text-blue-500 underline"><a href="/storage/{{$application->cv}}">Dokumen CV</a></p>
    </div>
    
    <!-- surat lamaran -->
    <div class="mt-4 text-justify">
        <h3 class="mb-2 text-lg font-medium">Surat Lamaran</h3>
        <p>
          {!! $application->applicant_letter !!}
        </p>
    </div>
</div>


@endsection