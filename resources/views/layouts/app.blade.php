<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <script src="{{ asset('js/everythingJS.js')}}"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('styleResource/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('styleResource/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/everythingCSS.css')}}">

        <!-- DataTables -->
    <script src="{{ asset('/styleResource/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/styleResource/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <style>
      #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 15px;
      }

      #snackbar.show {
          visibility: visible;
          -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
          animation: fadein 0.5s, fadeout 0.5s 2.5s;
      }

      @-webkit-keyframesfadein {
          from {
              bottom: 0;
              opacity: 0;
          }
          to {
              bottom: 30px;
              opacity: 1;
          }
      }

      @keyframesfadein {
          from {
              bottom: 0;
              opacity: 0;
          }
          to {
              bottom: 30px;
              opacity: 1;
          }
      }

      @-webkit-keyframesfadeout {
          from {
              bottom: 30px;
              opacity: 1;
          }
          to {
              bottom: 0;
              opacity: 0;
          }
      }

      @keyframesfadeout {
          from {
              bottom: 30px;
              opacity: 1;
          }
          to {
              bottom: 0;
              opacity: 0;
          }
      }

      .spinner {
          width: 55px;
          height: 55px;

          z-index: 9999;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          position: fixed;
          display: block;
          margin: auto;
      }

      .double-bounce1,
      .double-bounce2 {
          width: 100%;
          height: 100%;
          border-radius: 50%;
          background-color: darkred;
          opacity: 0.6;
          position: absolute;
          top: 0;
          left: 0;

          -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
          animation: sk-bounce 2.0s infinite ease-in-out;
      }

      .double-bounce2 {

          background-color: #0b3e6f;

      }

      .double-bounce2 {
          -webkit-animation-delay: -1.0s;
          animation-delay: -1.0s;
      }

      @-webkit-keyframessk-bounce {
          0%,
          100% {
              -webkit-transform: scale(0.0)
          }
          50% {
              -webkit-transform: scale(1.0)
          }
      }

      @keyframessk-bounce {
          0%,
          100% {
              transform: scale(0.0);
              -webkit-transform: scale(0.0);
          }
          50% {
              transform: scale(1.0);
              -webkit-transform: scale(1.0);
          }
      }

      .switch {
          position: relative;
          display: inline-block;
          width: 54px;
          height: 27px;
      }

      .switch input {
          display: none;
      }

      .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
      }

      .slider:before {
          position: absolute;
          content: "";
          height: 20px;
          width: 20px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
      }

      input:checked+.slider {
          background-color: green;
      }

      input:focus+.slider {
          box-shadow: 0 0 1px #2196F3;
      }

      input:checked+.slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
      }

      /* Rounded sliders */

      .slider.round {
          border-radius: 34px;
      }

      .slider.round:before {
          border-radius: 50%;
      }

    </style>

    <!-- Google Font -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/home" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="{{URL::to('logo_client.jpeg')}}" width="32px" height="32px"></span>

                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <img src="{{URL::to('logo_client.jpeg')}}" width="32px" height="32px">

                </span>

            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle Navigation</span>
            </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- Notifications: style can be found in dropdown.less -->
                        <?php
                        $user_id=Session::get('categoryEmployId');
                        $userCat=Session::get('categoryName');
                        $name=Session::get('employeeName');
                        ?>
                            <li class="dropdown user user-menu">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user-circle-o"> {{$name}}</i></a>

                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="employee_images/photo_default_emplyee1.png" class="img-circle" alt="User Image">

                                        <p>
                                            {{$name}}
                                            <small>{{$userCat}}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        Hello {{$name}}
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">

                                        <div class="pull-right">
                                            <a href="{{URL::to('/logout')}}" class="btn btn-danger btn-flat">SIGN OUT</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active">{{Request::path()}}</li>

                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <nav class="col-sm-1 navbar-right">
                    <a href="#sectionMenu" data-toggle="modal">
                    <ul class="alert" style="position: fixed;  z-index: 999;">
                        <button class="btn btn-lg btn-danger" style="background: #f9f9f9;">
                                <i class="fa fa-calendar" style="color:#178acc"></i>
                        </button>
                    </ul>
                    </a>
                </nav>
                <br> @yield('content')
            </section>
            <!-- /.content -->
            <div id="snackbar">Data Updated Successfully.</div>

        </div>


        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.0.1
            </div>
        </footer>

        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->



    <script>
        $(function() {
            dinamicMenu();

            $(".spinner").css("display", "none");

        });

        $.widget.bridge('uibutton', $.ui.button);
        $(document).ready(function() {
            $(document).ajaxStart(function() {
                $(".spinner").css("display", "block");
            });
            $(document).ajaxComplete(function() {
                $(".spinner").css("display", "none");
            });

        });
        function isInt(n) {
           return n % 1 === 0;
        }
        function showSnakBar() {
            var x = document.getElementById("snackbar")
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        function dinamicMenu() {
            var url = window.location;

            $('ul.sidebar-menu a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');

            // Will only work if string in href matches with location
            $('.treeview-menu li a[href="' + url + '"]').parent().addClass('active');
            // Will also work for relative and absolute hrefs
            $('.treeview-menu li a').filter(function() {
                return this.href == url;
            }).parent().parent().parent().addClass('active');
        };
    </script>
</body>

</html>