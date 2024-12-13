<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VSNK SHOP</title>
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/dist/img/favicon.jpg') }}" />
    <link rel="stylesheet" href="src/assets/css/styles.min.css" />
    <link rel="stylesheet" href="src/assets/css/custom.css" />
    {{-- toastr alert --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @stack('styles')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layout.ad.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">

            @include('layout.ad.header')

            <div class="body-wrapper-inner">
                <div class="container-fluid">

                    @yield('content')
                </div>
                @include('layout.ad.footer')
            </div>
        </div>
    </div>
    <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/assets/js/sidebarmenu.js"></script>
    <script src="src/assets/js/app.min.js"></script>
    <script src="src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="src/assets/js/dashboard.js"></script>
    {{-- sweet alert --}}
    <script src="src/assets/js/sweetalert.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    {{-- ckeditor --}}
    <script src="src/assets/js/ckeditor.js"></script>


    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @include('layout.ad.success')
    @include('layout.ad.error')

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
