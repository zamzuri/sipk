<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="SIPK PUSSAINSA - Sistem Informasi Pelayanan Kepegawaian PUSSAINSA">
        <meta name="kangzam" content="SPIKPUSSAINSA">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- App title -->
        <title>SIPK PUSSAINSA - Sistem Informasi Pelayanan Kepegawaian PUSSAINSA</title>

        <!-- App CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>
    <body>

        <div class="text-center logo-alt-box">
            <h5 class="text-muted m-t-0">SPIKPUSSAINSA</h5>
        </div>

        <div class="wrapper-page">

            <div class="m-t-30 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Page not Found</h4>
                </div>
                <div class="panel-body text-center ex-page-content">
                    <div class="text-error">404</div>
                    <p class="text-muted font-13 m-t-20">
                        It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us.
                        You might want to check your internet connection. Here's a little tip that might help you get
                        back on track.</p>
                </div>

            </div>
            <!-- end card-box -->

            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Back to <a href="{{url('home')}}" class="text-primary m-l-5"><b>Home</b></a></p>
                </div>
            </div>

        </div>
        <!-- end wrapper page -->




        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

    </body>
</html>