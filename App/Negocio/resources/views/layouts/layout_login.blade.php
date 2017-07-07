<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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


            <!-- /top navigation -->
            <div class="" role="main">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- jQuery custom content scroller -->

    <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    {{-- <script src="{{asset('/js/nprogress.js')}}"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{asset('/js/app.js')}}"></script>

    <script src="{{asset('/js/custom.js')}}"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        var base_url  = "http://190.8.110.120/";

        $('#onLogin').click(function(e){
            e.preventDefault();
            var username = $('#username').val();
            var password = $('#password').val();



            $.ajax({
            url: '/auth/login',
            type:"POST",
            data:{
              rut:username,
              password:password,
              _csrf :  $('meta[name="csrf-token"]').attr("content")
            } ,
            success: function(response){
              console.log("RESPONSE :",response);
              if (response.status == true) {
                   window.location.href="/";
              }else{
                  alert("cagaste");
              }

            },
            error:function(error){
              console.log(error);
            }
        });

        })

    })
    </script>


</body>
</html>
