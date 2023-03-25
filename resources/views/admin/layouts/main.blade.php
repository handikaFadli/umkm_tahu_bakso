<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Tahu Bakso Sambal Kecap Jani</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    {{-- tixt editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/trix.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/trix.js') }}"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
        .btn-coklat{
            background-color: #BC6C25;
            border: 1px solid #BC6C25;
        }
        .btn-coklat-muda1{
            background-color: #EADEB8;
            border: 1px solid #EADEB8;
        }
        .btn-coklat-muda2{
            background-color: #CFB784;
            border: 1px solid #CFB784;
        }
        .btn-coklat2{
            background-color: #C56824;
            border: 1px solid #C56824;
        }
        .btn-hijau{
            background-color: #A09F57;
            border: 1px solid #A09F57;
        }
        .btn-coklat:hover{
            background-color: transparent;
        }
        .text-coklat{
            color: #FEFAE0;
        }
        .text-coklat:hover{
            color: #BC6C25;
        }
        .bg-coklat{
            background-color: #C58940;
        }
        .bg-coklat-muda1{
            background-color: #EADEB8;
        }
        .bg-coklat-muda2{
            background-color: #CFB784;
        }
        .bg-coklat2{
            background-color: #C56824;
        }
        .bg-hijau{
            background-color: #A09F57;
        }
        .bg-coba{
            background-color: #C87941;
        }
        
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" /> --}}

    {{-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" /> --}}
    
</head>
<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        @include('admin.layouts.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            {{-- menu setting tema --}}
            {{-- <div class="theme-setting-wrapper">
                <div id="settings-trigger" class="">
                    <i class="ti-settings"></i>
                </div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme"> 
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>
                        Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                        Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div> --}}

            {{-- include sidebar --}}
            @include('admin.layouts.sidebar')
            
            <div class="main-panel">

                {{-- content --}}
                <div class="content-wrapper">
                    @yield('content')
                </div>

                {{-- include footer --}}
                @include('admin.layouts.footer')
                

            </div>

        </div>

    </div>
    <!-- container-scroller -->
    
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    {{-- <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> --}}
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.roundedBarCharts.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>

