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

    {{-- Tailwind & Alpine --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    @stack('styles')
</head>

<body>

    <div x-data="{ navOpen: false, scrolledFromTop: false }" x-init="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
        @scroll.window="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
        :class="{
            'overflow-hidden': navOpen,
        }">
        <header>
                @includeWhen(request()->is('/') ,'home.partials.navbar')
                @includeUnless(request()->is('/'), 'partials.navbar')
        </header>
        <main>
            {{ $slot }}
        </main>
        <footer>
            @include('partials.footer')
        </footer>
        @include('partials.scroolBack-to-topButton')
    </div>

    @stack('scripts')
</body>

</html>
