<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Rekrutmen PT. GRAHA MUTU PERSADA' }}</title>
    <!-- Assets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/landing-page.css">

 {{-- Trix Editor --}}
 <link rel="stylesheet" type="text/css" href="/css/trix.css">
 <script type="text/javascript" src="/js/trix.js"></script>
 <style>
     trix-toolbar [data-trix-button-group="file-tools"] {
         display: none;
     }
 </style>
 
    {{-- Tailwind CSS  --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

</head>

<body>

    <div x-data="{ navOpen: false, scrolledFromTop: false }" x-init="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
        @scroll.window="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
        :class="{
            'overflow-hidden': navOpen,
        }">
        <header>
            @if (request()->is('/'))
                @include('home.partials.navbar')
            @else
                @include('partials.navbar')
            @endif
        </header>
        <main>
            {{ $slot }}
        </main>
        <footer>
            @include('partials.footer')
        </footer>
        @include('partials.scroolBack-to-topButton')
    </div>

</body>

</html>
