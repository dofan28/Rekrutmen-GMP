<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel=”icon” type=”image/png” href=”images/favicon.png”>

      {{-- Tailwind CSS  --}}
      @vite('resources/css/app.css')
      @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 flex flex-col h-screen">
    <div class="flex flex-col items-center justify-center flex-1">
        <h1 class="text-6xl font-bold text-gray-800 mb-4">@yield('code')</h1>
        <p class="text-2xl text-gray-600 mb-8">@yield('message')</p>
        <a href="#" class="px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">Kembali</a>
    </div>
    <footer class="text-center text-gray-500 text-sm py-4">© 2023 Your Website</footer>
</body>
</html>