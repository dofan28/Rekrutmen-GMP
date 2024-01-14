<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Rekrutmen PT. GRAHA MUTU PERSADA' }}</title>
    {{-- Assets --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/dashboard.css">

    {{-- Tailwind CSS --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body>
    <nav>
        @include('dashboard.partials.navbar')
    </nav>
    <div class="pt-12 lg:flex">
        <aside>
            @include('dashboard.partials.sidebar')
        </aside>
        <main>
            <div class="w-full h-full p-4 m-8 overflow-y-auto">
                <div class="flex items-center justify-center p-16 mr-8 border-4 border-dotted lg:p-40">
                    {{ $slot }}
                </div>
            </div>
        </main>

    </div>
    @include('landing.partials.scroolBack-to-topButton')
    <script src="/js/dashboard.js"></script>
</body>

</html>
