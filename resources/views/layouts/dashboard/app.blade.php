<html style="" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
        
        <!-- Title -->
        <title>Admin Dashboard</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="Steelcoders">
        
        <!-- Styles -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600')}}')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dashboard/plugins/pace-master/themes/blue/pace-theme-flash.css')}}" rel="stylesheet">
        <link href="{{ asset('dashboard/plugins/uniform/css/uniform.default.min.css')}}" rel="stylesheet">
        <link href="{{ asset('dashboard/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dashboard/plugins/fontawesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dashboard/plugins/line-icons/simple-line-icons.css')}}" rel="stylesheet" type="text/css"> 
        <link href="{{ asset('dashboard/plugins/offcanvasmenueffects/css/menu_cornerbox.css')}}" rel="stylesheet" type="text/css">  
        <link href="{{ asset('dashboard/plugins/waves/waves.min.css')}}" rel="stylesheet" type="text/css">  
        <link href="{{ asset('dashboard/plugins/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dashboard/plugins/3d-bold-navigation/css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dashboard/plugins/slidepushmenus/css/component.css')}}" rel="stylesheet" type="text/css"> 
        <link href="{{ asset('dashboard/plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet" type="text/css">   
        <link href="{{ asset('dashboard/plugins/metrojs/MetroJs.min.css')}}" rel="stylesheet" type="text/css">  
        {{-- <link href="{{ asset('dashboard/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css">     --}}
        {{-- Noty --}}
        <link rel="stylesheet" href="{{ asset('dashboard/plugins/noty/noty.css')}}"  type="text/css">  
        <script src="{{ asset('dashboard/plugins/noty/noty.min.js')}}"></script>  
            
        <!-- Theme Styles -->
        <link href="{{ asset('dashboard/css/modern.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dashboard/css/themes/dark.css')}}" class="theme-color" rel="stylesheet" type="text/css">
        <link href="{{ asset('dashboard/css/custom.css')}}" rel="stylesheet" type="text/css">
        
        <script src="{{ asset('dashboard/plugins/3d-bold-navigation/js/modernizr.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/offcanvasmenueffects/js/snap.svg-min.js')}}"></script>         

</head>
    
<body class="page-header-fixed  pace-done">

        @include('layouts.dashboard._sidebar')

                <!-- Page Sidebar -->{{-- /////////////////////////////////////////// --}}
        @include('layouts.dashboard._navbar')
                <!-- Navbar --> {{-- /////////////////////////////////////////// --}}

        {{-- /////////////////// --}}
        @include('partials._session')
  <main class="page-content content-wrap">
    <div class="page-inner" style="min-height:667px !important">


        @yield('content') {{-- ////////////////////////////////////////////// --}} 
        <div class="page-footer">
          <p class="no-s">2019 © Abdelrhman.</p>
        </div>

    </div><!-- Page Inner -->
  </main>
    <div>
        <!-- Javascripts -->
        <script src="{{ asset('dashboard/plugins/jquery/jquery-2.1.4.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/pace-master/pace.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/jquery-blockui/jquery.blockui.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/switchery/switchery.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/uniform/jquery.uniform.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/offcanvasmenueffects/js/classie.js')}}"></script>
        {{-- <script src="{{ asset('dashboard/plugins/offcanvasmenueffects/js/main.js')}}"></script> --}}
        <script src="{{ asset('dashboard/plugins/waves/waves.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/3d-bold-navigation/js/main.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/jquery-counterup/jquery.counterup.min.js')}}"></script>
        {{-- <script src="{{ asset('dashboard/plugins/toastr/toastr.min.js')}}"></script> --}}
        <script src="{{ asset('dashboard/plugins/flot/jquery.flot.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/flot/jquery.flot.time.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/flot/jquery.flot.symbol.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/flot/jquery.flot.resize.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/curvedlines/curvedLines.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/metrojs/MetroJs.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/modern.js')}}"></script>
        <script src="{{ asset('dashboard/js/pages/dashboard.js')}}"></script>                    
    </div>

        
    
    {{-- <div id="flotTip" style="display: none; position: absolute;"> --}}
        
    </div>

    <script>
        //delete
        $('.delete').click(function (e) 
        {

            var that = $(this)

            e.preventDefault();

            var n = new Noty(
            {
                text: "Confirm Delete",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("Yes", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("No", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();
        });//end of delete

        // image preview
        $(".image").change(function () 
        {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
</body>
{{-- <div class="page-footer">
<p class="no-s">2019 © Abdelrhman.</p>
</div> --}}
</html>