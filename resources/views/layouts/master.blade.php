<!DOCTYPE html>

<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     @yield('stylesheets');

</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper" id="app">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('images/vet-clinic-cover.png')}}" class="img-circle" alt="Clinic Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name??''}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <label>
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                    </label>
                    <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->

                <li><a href="{{ route('clinics.create') }}"><i class="fa fa-file"></i> <span>Clinic</span></a></li>
                <li><a href="{{ route('owners') }}"><i class="fa fa-file"></i> <span>Owner</span></a></li>
                <li><a href="{{ route('pets') }}"><i class="fa fa-file"></i> <span>Pets</span></a></li>
                <li><a href="{{ route('prescriptions') }}"><i class="fa fa-file"></i> <span>Prescription</span></a></li>
                <li><a href="{{ route('specializations') }}"><i class="fa fa-file"></i> <span>Specialization</span></a></li>
                <li><a href="{{ route('species') }}"><i class="fa fa-file"></i> <span>Species</span></a></li>
                <li><a href="{{ route('vets') }}"><i class="fa fa-file"></i> <span>Vets</span></a></li>
                <li><a href="{{ route('visits') }}"><i class="fa fa-file"></i> <span>Visits</span></a></li>
                <li><a href="{{ route('worktime') }}"><i class="fa fa-file"></i> <span>Worktime</span></a></li>

                @can('isAdmin')
                    <li class="active"><a href="{{url('')}}"><i class="fa fa-microchip"></i> <span>Clinics</span></a></li>
                @endcan

                @can('isAdmin')
                    <li><a href="#"><i class="fa fa-users"></i> <span>Manage User</span></a></li>
                    <li><a href="#"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
                @endcan
                <li class="">

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off text-red"></i>   <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content container-fluid">
            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>

<script>


    $('#edit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var name = button.data('name')
        var address = button.data('address')
        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #add').val(address);
        modal.find('.modal-body #cli_id').val(cli_id);
    })


    $('#delete').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)

        var cli_id = button.data('cli_id')
        var modal = $(this)

        modal.find('.modal-body #cli_id').val(cli_id);
    })


</script>
@yield('javascripts')
</body>
</html>
