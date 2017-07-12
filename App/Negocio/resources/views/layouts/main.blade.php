<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token() }}" >

  <title>MedicalGest | @yield('title')</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('/css/app.css')}}">
  <!-- Font Awesome -->
  <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  {{-- <link href="{{asset('/css/nprogress.css')}}" rel="stylesheet"> --}}
  <!-- jQuery custom content scroller -->
  {{-- <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/> --}}

  <!-- Custom Theme Style -->
  <link href="{{asset('/css/custom.css')}}" rel="stylesheet">


  <link rel="stylesheet" href="{{asset('/css/main.css')}}">
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
</head>
<body class="nav-md fixed_sidebar">

  <div class="container body">

    <div class="main_container">
          <div id="loading" style="display:none;"></div>
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-heartbeat"></i> <span>MedicalGest</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
            </div>

          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                @if (\Request::session()->has('user'))
                  @if (\Request::session()->get('user')['tipo'] == 2)
                    <li><a><i class="fa fa-home"></i> Recepcion Pacientes <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/Recepcion">Ingresar paciente</a></li>
                      </ul>
                    </li>
                  @else
                    <li><a><i class="fa fa-home"></i> Fichas Pacientes <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/ListadoFichas">Listado</a></li>
                      </ul>
                    </li>
                  @endif
                @endif

              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="/auth/logout" class="user-profile dropdown-toggle">
                  Logout
                </a>
              </li>
            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->
      <div class="right_col" role="main">

        @yield('content')
      </div>
    </div>
  </div>

  <!-- jQuery custom content scroller -->


  {{-- <script src="{{asset('/js/nprogress.js')}}"></script> --}}
  <script src="{{asset('/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('/js/dataTables.responsive.js')}}"></script>
  <script src="{{asset('/js/responsive.bootstrap.js')}}"></script>
  <script src="{{asset('/js/dataTables.scroller.js')}}"></script>
  <script src="{{asset('/js/moment.js')}}"></script>
  <script src="{{asset('/js/spin.js')}}"></script>
  <script type="text/javascript">
  $('#datatable').DataTable();
  var opts = {
    lines: 13 // The number of lines to draw
    , length: 28 // The length of each line
    , width: 14 // The line thickness
    , radius: 42 // The radius of the inner circle
    , scale: 1 // Scales overall size of the spinner
    , corners: 1 // Corner roundness (0..1)
    , color: '#000' // #rgb or #rrggbb or array of colors
    , opacity: 0.25 // Opacity of the lines
    , rotate: 0 // The rotation offset
    , direction: 1 // 1: clockwise, -1: counterclockwise
    , speed: 1 // Rounds per second
    , trail: 60 // Afterglow percentage
    , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
    , zIndex: 2e9 // The z-index (defaults to 2000000000)
    , className: 'spinner' // The CSS class to assign to the spinner
    , top: '50%' // Top position relative to parent
    , left: '50%' // Left position relative to parent
    , shadow: false // Whether to render a shadow
    , hwaccel: false // Whether to use hardware acceleration
    , position: 'absolute' // Element positioning
  }
  var target = document.getElementById('loading')
  var spinner = new Spinner(opts).spin(target);
  console.log("SPINNER" , spinner);
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="{{asset('/js/app.js')}}"></script>
  <script src="{{asset('/js/main.js')}}"></script>
  <script src="{{asset('/js/bootstrap-typeahead.js')}}"></script>
  <script src="{{asset('/js/custom.js')}}"></script>
  <script src="{{asset('/js/validaRut.js')}}"></script>




</body>
</html>
