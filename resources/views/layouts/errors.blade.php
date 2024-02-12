<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    {{-- Tailwind CSS  --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
</head>
<body>
    <section class="flex items-center h-full p-16 text-gray-800">
        <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
            <div class="max-w-lg text-center">
                <h2 class="mb-8 font-bold text-9xl font-montserrat">
                    <span class="sr-only">Error</span>@yield('code')
                </h2>
                <p class="text-2xl font-semibold md:text-3xl font-poppins">@yield('message-header')</p>
                <p class="mt-4 mb-8 text-gray-400 font-poppins">@yield('message-body')</p>
                <a rel="noopener noreferrer" href="/" class="px-8 py-3 font-semibold  bg-blue-800 text-gray-100 font-montserrat">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </section>
</body>
</html>
