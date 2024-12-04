<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NWS BOOKING</title>
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- font chữ poppins --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
    {{-- font chữ roboto --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- bootstrap4.6 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    {{-- client.css --}}
    <link rel="stylesheet" href="{{ asset('assets/dist/css/client.css') }}">
    @stack('styles')
</head>

<body>
    @include('layout.client.header')
    <main>
        @yield('content')
    </main>
    @include('layout.client.footer')

    {{-- Client.js --}}
    <script src="{{ asset('assets/dist/js/client.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
