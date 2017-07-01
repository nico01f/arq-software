<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token() }}" >

  <title>Gestion epicrisis | @yield('title')</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('/css/app.css')}}">
  <!-- Font Awesome -->
  <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  {{-- <link href="{{asset('/css/nprogress.css')}}" rel="stylesheet"> --}}
  <!-- jQuery custom content scroller -->
  {{-- <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/> --}}

  <!-- Custom Theme Style -->
  <link href="{{asset('/css/custom.css')}}" rel="stylesheet">


  <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body class="nav-md sidebar_fixed">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Gestion epicrisis</span></a>
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
                <li><a><i class="fa fa-home"></i> Recepcion Pacientes <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/">Buscar</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-home"></i> Fichas Pacientes <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/">Listado</a></li>
                  </ul>
                </li>
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
                <a href="javascript::" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">John Doe
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;"> Profile</a></li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li><a href="javascript:;">Help</a></li>
                  <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
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

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
  {{-- <script src="{{asset('/js/nprogress.js')}}"></script> --}}

  <script src="{{asset('/js/moment.js')}}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="{{asset('/js/app.js')}}"></script>
  <script src="{{asset('/js/main.js')}}"></script>
  <script src="{{asset('/js/bootstrap-typeahead.js')}}"></script>
  <script src="{{asset('/js/custom.js')}}"></script>
  <script src="{{asset('/js/validaRut.js')}}"></script>




</body>
</html>
