@extends('layouts.dashboard')

@section('content')
    <div class="w-11/12 p-6 mx-auto mt-6 text-gray-600 bg-white rounded-md shadow-md lg:w-3/4">
        <div class="grid gap-2 mb-2 text-xs lg:flex lg:justify-evenly">
            <a href="/hrd/applications/applicant/{{$applicant_id}}/applicantdata"
                class="px-4 py-2 text-xs font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">Data
                Pelamar</a>
            <a href="/hrd/applications/applicant/{{$applicant_id}}/contact" class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md  focus:outline-none focus:bg-blue-500 focus:text-white focus:border-none">Kontak</a>
            <a href="/hrd/applications/applicant/{{$applicant_id}}/workexperience"
                class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md  focus:outline-none focus:bg-blue-500 focus:text-white focus:border-none">Pengalaman
                Kerja</a>
            <a href="/hrd/applications/applicant/{{$applicant_id}}/educationalbackground"
                class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md  focus:outline-none focus:bg-blue-500 focus:text-white focus:border-none">Riwayat
                Pendidikan</a>
            <a href="/hrd/applications/applicant/{{$applicant_id}}/organizationalexperience"
                class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md  focus:outline-none focus:bg-blue-500 focus:text-white focus:border-none">Pengalaman
                Organisasi</a>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Alamat Lengkap:</label>
            <p class="font-semibold">{{$contact->street}}, {{ $contact->subdistrict}}, {{$contact->city}}, {{$contact->province}}, {{$contact->postal_code}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Email:</label>
            <p class="font-semibold">{{$contact->email}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Nomor HP:</label>
            <p class="font-semibold">{{$contact->phone}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">LinkedIn:</label>
            <p class="font-semibold">{{$contact->linkedin}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Facebook:</label>
            <p class="font-semibold">{{$contact->facebook}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600">Instagram:</label>
            <p class="font-semibold">{{$contact->instagram}}</p>
        </div>
    </div>
@endsection
