@extends('layouts.dashboard')

@section('content')
    <div class="mx-4 lg:ml-8">
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
        @if ($applicants->where('deleted_at', null)->isEmpty())
            <div class="mt-24 text-gray-600">
                <h1 class="mb-2 text-2xl font-semibold text-center lg:text-3xl">Data pelamar tidak tersedia.</h1>
            </div>
        @else
            <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                <thead class="border-b border-gray-200 bg-gray-50">
                    <tr class="text-left text-gray-600">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Data Pribadi</th>
                        <th class="px-4 py-3">Kontak</th>
                        <th class="px-4 py-3">Pengalaman Kerja</th>
                        <th class="px-4 py-3">Riwayat Pendidikan</th>
                        <th class="px-4 py-3">Pengalaman Organisasi</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($applicants as $applicant)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $applicant->email }}</td>
                            <td class="px-4 py-3">
                                @if (isset($applicant->applicantdata))
                                    <a href="/admin/applicant/applicantdata/{{ $applicant->applicantdata->id }}"
                                        class="text-blue-600 hover:underline">Data Pribadi</a>
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if (isset($applicant->contact))
                                    <a href="/admin/applicant/contact/{{ $applicant->contact->id }}"
                                        class="text-blue-600 hover:underline">Kontak</a>
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if (!blank($applicant->workexperience))
                                    <a href="/admin/applicant/workexperience/{{ $applicant->id }}"
                                        class="text-blue-600 hover:underline">Pengalaman Kerja</a>
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if (!blank($applicant->educationalbackground))
                                    <a href="/admin/applicant/educationalbackground/{{ $applicant->id }}"
                                        class="text-blue-600 hover:underline">Riwayat Pendidikan</a>
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if (!blank($applicant->organizationalexperience))
                                    <a href="/admin/applicant/organizationalexperience/{{ $applicant->id }}"
                                        class="text-blue-600 hover:underline">Pengalaman Organisasi</a>
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <form action="/admin/applicants/{{ $applicant->id }}" method="post"
                                    class="inline-block px-2 py-1 text-white bg-red-500 rounded hover:bg-red-700">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>

    {{-- paginate --}}
    {{-- <div class="flex justify-center mt-6">
        {{ $jobs->appends(request()->all())->links() }}
    </div> --}}
@endsection
