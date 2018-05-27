<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fluid-gallery.css') }}">  
    <link rel="stylesheet" href="{{ asset('vendors/dripicons-master/webfont/webfont.css') }}">
</head>
<body >
    <div class="loader"></div>
    <div  id="app">
        @include('layouts/partials/navegator')
        <main id="main" role="main" class="bg-light">
            <div class="container">
                @include('flash::message')
                @yield('content')
            </div>
        </main>
        @include('layouts/partials/footer')
        <!-- Modals -->
        @include('layouts/partials/modals')
        @yield('modals')
    </div>
    <!-- *** Scripts *** -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!-- Website loader animation -->
    <script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
    <!-- Effect to dropdowns -->
    <script type="text/javascript" src="{{ asset('js/dropdown-effect.js') }}"></script> 
    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chat.js') }}"></script> 
    <!-- Effect to dropdowns --> 
    <script type="text/javascript" src="{{ asset('/js/scroll.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-103595978-1"></script>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-103595978-1');
    </script>
    <script src="{{ asset('js/fileinput.min.js') }}"></script>

    <script type="text/javascript"> 
        $(document).on('ready', function() {
            $("#imagen").fileinput({
                showUpload: false,
                browseLabel: 'Imagen',
                browseIcon: '<i class="fa fa-folder-open"></i>&nbsp;',
                removeIcon: '<i class="fa fa-trash-o"></i>&nbsp;',
                removeLabel: 'Eliminar Todo',
                maxFileCount: 3,
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                layoutTemplates: {
                    fileIcon: '<i class="fa fa-file"></i> '
                },
                fileActionSettings : {
                    uploadIcon: '<i class="fas fa-upload"></i>',
                    uploadClass: 'btn btn-primary btn-xs',
                    dragIcon: '<i class="fas fa-bars"></i>',
                    dragClass: 'text-info',
                    removeClass: 'btn btn-danger btn-xs',
                    removeIcon: '<i class="fas fa-trash"></i>',
                    zoomIcon: '<i class="fas fa-search-plus"></i>',
                    zoomClass: 'btn btn-xs btn-info',
                    indicatorNew: '<i class="fa fa-hand-o-down"></i>',
                    indicatorSuccess: '<i class="fas fa-check-circle fa-lg"></i>',
                    indicatorError: '<i class="fas fa-exclamation-circle"></i>',
                    uploadRetryIcon: '<i class="fas fa-repeat text-info"></i>',
                    indicatorLoading: '<i class="fas fa-hand-o-up"></i>',
                    zoomIndicator: '<i class="fas fa-search-plus"></i>',
                },
                fileActionSettings : {
                    showDrag: false,
                    showZoom: false,
                    showUpload: false,
                    showDelete: false,
                    indicatorNew: "",
                    indicatorSuccess: "",
                    indicatorError: ""
                }
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>
