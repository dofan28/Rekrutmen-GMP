@extends('layouts.dashboard')
<div
    class="fixed top-0 left-0 flex items-center justify-center hidden object-center w-full h-screen bg-black modal bg-opacity-60">
    <div class="items-center justify-center inline-block w-3/4 px-4 py-2 bg-white rounded-lg shadow-md ">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium">Data Pelamar</h3>
            <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer close-modal" height="1em" viewBox="0 0 384 512">
                <path
                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
            </svg>
        </div>
        <hr>
        <div class="mt-2">
            <p>Nama :</p>
            <p>alamat :</p>
            <p>no.hp :</p>
            <p>tempat lahir :</p>
            <p>Tanggal lahir:</p>
        </div>
    </div>
</div>
@section('content')
    <div class="mx-4 lg:mx-10">
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
            <div class="mt-24 text-gray-600">
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Lamaran tidak tersedia.</h1>
            </div>
        @else
            <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                <thead class="bg-gray-200 border-b border-gray-200">
                    <tr class="text-center text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Pelamar</th>
                        <th class="px-4 py-3">Posisi</th>
                        <th class="px-4 py-3">Data Pelamar</th>
                        <th class="px-4 py-3">Lampiran</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($applications as $application)
                        <tr>
                            <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-center">
                                @if (isset($application->applicant->applicantdata->full_name))
                                    <a href="/hrd/applications/applicant/{{ $application->id }}/applicantdata"
                                        class="text-blue-600 hover:underline">{{ $application->applicant->applicantdata->full_name }}</a>
                                @else
                                    {{ $application->applicant->email }}
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">{{ $application->job->position }}</td>
                            <td class="px-4 py-3 text-center">@livewire('hrd.partials.showapplicantdatamodal')</td>
                            <td class="px-4 py-3 text-center">
                                @if ($application->cv)
                                    <a href="/storage/{{ $application->cv }}" class="text-blue-600 hover:underline">CV </a>
                                @else
                                    <button class="text-danger-600" disabled>Tidak ada CV </button>
                                @endif
                                |
                                <a href="/hrd/applications/{{ $application->id }}" class="text-blue-600 hover:underline">
                                    Surat
                                    Lamaran </a>|
                                <button type="button" class="text-blue-600 show-modal hover:underline">
                                    Detail
                                </button>
                            </td>
                            <td class="flex flex-col justify-center px-4 py-3 lg:flex-row">
                                <div class="flex gap-1">
                                    @if ($application->status == -1)
                                        <a href="/hrd/applications/{{ $application->id }}/accept"
                                            onclick="return confirm('Anda yakin menerima lamaran?')"
                                            class="flex justify-center px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700">Terima</a>
                                        <a href="/hrd/applications/{{ $application->id }}/reject"
                                            onclick="return confirm('Anda yakin menolak lamaran?')"
                                            class="flex justify-center px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700">Tolak</a>
                                    @elseif ($application->status == 0)
                                        Ditolak
                                    @elseif ($application->status == 1)
                                        Diterima
                                    @endif
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
    <div class="flex justify-center my-4">
        {{ $applications->appends(request()->all())->links() }}
    </div>
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
@endsection
