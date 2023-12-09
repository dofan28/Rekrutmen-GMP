<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- Assets --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel=”icon” type=”image/png” href=”images/favicon.png”>

    {{-- Tailwind CSS --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body class="font-body">
    <div class="min-h-screen lg:flex">
        <aside>
            @if (Auth::user()->role == 'applicant')
                @include('applicant.partials.sidebar')
            @elseif (Auth::user()->role == 'hrd')
                @include('hrd.partials.sidebar')
            @elseif (Auth::user()->role == 'admin')
                @include('admin.partials.sidebar')
            @endif
        </aside>
        <main class="w-full lg:pl-36">
            <main>
                {{ $slot }}
            </main>
        </main>
    </div>
    <script src="/js/dashboard.js"></script>
</body>

</html>
