@extends('layouts.dashboard')

@section('content')
    <div class="w-11/12 p-6 mx-auto mt-10 text-gray-600 bg-white rounded-md shadow-md lg:w-3/4">
        <a href="/admin/applicants" class="flex items-center mb-4 w-min hover:underline">
            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0 L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29 h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"></path> </g></svg>
            <p class="ml-2 text-sm font-medium">Kembali</p>
        </a>
        @foreach ($organizationalexperiences as $organizationalexperience)
            <div class="mb-4">
                <label class="text-gray-600">Nama Organisasi:</label>
                <p class="font-semibold">{{ $organizationalexperience->organizational_name }}</p>
            </div>
            <div class="mb-4">
                <label class="text-gray-600">Bidang Studi:</label>
                <p class="font-semibold">{{ $organizationalexperience->position }}</p>
            </div>
        @endforeach
        {{-- paginate --}}
        <div class="flex justify-center mt-6">
            {{ $organizationalexperiences->appends(request()->all())->links() }}
        </div>
    </div>
@endsection
