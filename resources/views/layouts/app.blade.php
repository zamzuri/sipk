<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="SIPK PUSSAINSA - Sistem Informasi Pelayanan Kepegawaian PUSSAINSA">
        <meta name="kangzam" content="SPIKPUSSAINSA">

        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

        <title>SIPK PUSSAINSA - Sistem Informasi Pelayanan Kepegawaian PUSSAINSA</title>


        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('selectize/dist/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- datepicker -->
        <link href="{{ asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

        <!-- touchspin -->
        <link href="{{ asset('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />

        <link href="{{ asset('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/plugins/select2/dist/css/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
        <!-- Circlifull chart css -->
        <link href="{{ asset('assets/plugins/jquery-circliful/css/jquery.circliful.css')}}" rel="stylesheet" type="text/css"/>

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
        <style type="text/css">
            td.details-control {
                background: url('images/details_open.png') no-repeat center center;
                cursor: pointer;
            }
            tr.shown td.details-control {
                background: url('images/details_close.png') no-repeat center center;
            }
        </style>

    </head>


    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="{{ url('home') }}" class="logo">
                            <span>SIPK<span>PUSSAINSA</span></span>
                        </a>
                    </div>
                    <!-- End Logo container-->

                    <div class="navbar-custom navbar-left">
                        <div id="navigation">
                            <!-- Navigation Menu-->
                            <ul class="navigation-menu">
                                @if(Auth::check())
                                <li>
                                    <a href="{{ url('home') }}">
                                        <span><i class="zmdi zmdi-view-dashboard"></i></span>
                                        <span>Dashboard</span>
                                      </a>
                                </li>
                                @can('admin-access')
                                <li class="has-submenu">
                                    <a href="#">
                                        <span><i class="zmdi zmdi-invert-colors"></i></span>
                                        <span> Master Data </span> </a>
                                    <ul class="submenu">
                                        <li>
                                            <ul>
                                                <li><a href="{{ url('pegawai') }}"><i class="fa fa-btn fa-sign-out"></i>Pegawai</a></li>
                                                <li><a href="{{ url('bidang') }}"><i class="fa fa-btn fa-sign-out"></i>Bidang</a></li>
                                                <li><a href="{{ url('pangkat') }}"><i class="fa fa-btn fa-sign-out"></i>Pangkat</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">
                                        <span><i class="zmdi zmdi-invert-colors"></i></span>
                                        <span> Grafik statistik </span> </a>
                                    <ul class="submenu">
                                        <li>
                                            <ul>
                                               <li><a href="{{ url('laporanbidang') }}"><i class="fa fa-btn fa-sign-out"></i>Data Bidang</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">
                                        <span><i class="zmdi zmdi-invert-colors"></i></span>
                                        <span> Pengaturan </span> </a>
                                    <ul class="submenu">
                                        <li>
                                            <ul>
                                                <li><a href="{{ url('pensiun') }}"><i class="fa fa-btn fa-sign-out"></i>Atur Pegawai Pensiun</a></li>
                                                <li><a href="{{ url('tugasbelajar') }}"><i class="fa fa-btn fa-sign-out"></i>Atur Pegawai Tugas Belajar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('home') }}">
                                        <span><i class="zmdi zmdi-invert-colors"></i></span>
                                        <span>Daftar PTT</span>
                                      </a>
                                </li>
                                @endcan
                                @can('pegawai-access')
                                <li class="has-submenu">
                                    <a href="#">
                                        <span><i class="zmdi zmdi-invert-colors"></i></span>
                                        <span> Grafik statistik </span> </a>
                                    <ul class="submenu">
                                        <li>
                                            <ul>
                                                <li><a href="{{ url('laporanbidang') }}"><i class="fa fa-btn fa-sign-out"></i>Data Bidang</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                 <li>
                                    <a href="{{ url('profil') }}">
                                        <span><i class="zmdi zmdi-view-user"></i></span>
                                        <span>Profil</span> </a>
                                </li>
                                @endcan
                                @endif
                            </ul>
                            <!-- End navigation menu  -->
                        </div>
                    </div>


                    <div class="menu-extras">
                        <ul class="nav navbar-nav navbar-right pull-right">
                            @if(Auth::check())
                            @can('admin-access')
                            <li>
                                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                     <input type="text" placeholder="Cari pegawai" class="form-control typeahead" data-provide="typeahead" autocomplete="off">
                                     <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>

                            @endcan
                            @endif
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                            @elseif(Auth::check())
                                <li class="dropdown user-box">
                                    <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                        <img src="{{ (Auth::user()->can('pegawai-access'))?asset('img/'.App\Pegawai::where('user_id',Auth::user()->id)->first()->photo):asset('images/default.png') }}" alt="user-img" class="img-circle user-img">
                                        <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> {{ Auth::user()->name }}</a></li>
                                        <li><a href="{{ url('/logout') }}"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            @endif

                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>


        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
        </br></br>
            <div class="container">
                @if (session()->has('flash_notification.message'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-{{ session()->get('flash_notification.level') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session()->get('flash_notification.message') }}
                        </div>
                    </div>
                </div>
                @endif

                @yield('content')


                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                {{date('Y')}} © LAPAN.
                            </div>
                            <div class="col-xs-6">
                                <ul class="pull-right list-inline m-b-0">
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->
            </div>
            <!-- end container -->
            <!-- Right Sidebar -->
            <!-- /Right-bar -->
        </div>

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
        <script src="{{ asset('sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('selectize/dist/js/standalone/selectize.min.js') }}"></script>

        <!-- Counter Up  -->
        <script src="{{ asset('assets/plugins/waypoints/lib/jquery.waypoints.js') }}"></script>
        <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

        <!-- Datatables-->
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.scroller.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
        <script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}" type="text/javascript"></script>

        <!-- datepicker -->
        <script src="{{ asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

        <!-- Circliful -->
        <script src="{{ asset('assets/plugins/jquery-circliful/js/jquery.circliful.min.js') }}"></script>

        <!-- touchspin -->
        <script src="{{ asset('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>

        <!-- typeahead -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


        <script src="{{asset('chartjs/chart.js')}}"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>



        <!-- App js -->
        <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('js/filereader.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
        $(document).ready(function(){
            $('.alert').delay(2000).fadeOut('slow');
            grafik_pendidikan();
            grafik_pangkat();
            grafik_bidang();
            select_tugas_belajar();
            })

            function grafik_pendidikan(){
                $.ajax({
                    dataType:'script',
                    url:'{{URL::to("grafik_berdasarkan_pendidikan")}}',
                    success:function(data) {

                    }
                });
            }
            
            function grafik_pangkat(){
                $.ajax({
                    dataType:'script',
                    url:'{{URL::to("grafik_berdasarkan_pangkat")}}',
                    success:function(data) {
                    }
                });
            }
            
            function grafik_bidang(){
                $.ajax({
                    dataType:'script',
                    url:'{{URL::to("grafik_berdasarkan_bidang")}}',
                    success:function(data) {
                    }
                });
            }

            function select_tugas_belajar(){
                var today = new Date();
                var year = today.getFullYear();
                // Get the data and display them!
                $.getJSON("{{ url('tugasbelajar/list') }}"+"/"+year,
                     function (data) {
                        var output = '';

                        if (data.error !== 0)
                           output = '<i>There are no data...</i>';

                        $.each(data.pegawai, function (index, elem) {
                            // Build up the string of HTML to display information
                            output +="<div class=\"inbox-item\">" +
                                     "   <div class=\"inbox-item-img\">" +
                                     "       <img src=\"img/" + elem.file +"\" class=\"img-circle\">" +
                                     "   </div>" +
                                     "   <p class=\"inbox-item-author\">" + elem.nama + "</p>" +
                                     "   <p class=\"inbox-item-text\">" + elem.bidang + "</p>" +
                                     "</div>";
                        });

                        $("#tugasbelajar").show().html(output);
                    }
               );
            }

            function foo(query, process){
                // Query to server.
                $.getJSON('{{ url("search") }}', { q: query }, function (data) {
                 // if(data.success == 1){
                        process(data)
                  //}
                })
            }

            $('.typeahead').typeahead({source: foo})
        </script>
        @stack('scripts')
    </body>
</html>
