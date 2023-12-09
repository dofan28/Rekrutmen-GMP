@extends('layouts.dashboard')

@section('content')
<div class="flex justify-center">
    <div class="w-11/12 mx-6 mt-12 lg:w-3/4">
        <div class="px-4 py-6 rounded-sm shadow-md lg:container lg:mx-auto lg:px-6">
            <h2 class="text-xl font-semibold text-gray-700">Kirim ke Pelamar</h2>
            <hr class="w-full mb-4">
            <div>
                <form action="/hrd/applications/accept" method="post" class="flex flex-col">
                    @csrf
                    <input type="hidden" name="id" value="{{$application->id}}">
                    <textarea class="p-2 mt-2 mb-6 bg-gray-200 rounded-lg outline-none focus:border focus:border-blue-500"
                    id="company_letter" rows="4" placeholder="Description" name="company_letter" required></textarea>
                    <div class="flex justify-center">
                        <button type="submit" class="w-40 px-4 py-2 font-medium text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-700 focus:ring focus:ring-blue-400">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
