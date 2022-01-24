
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('admin.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    {{--        <section class="content-header">--}}
    {{--            <div class="container-fluid">--}}
    {{--                <div class="row mb-2">--}}
    {{--                    <div class="col-sm-6">--}}
    {{--                        <h1>Validation</h1>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-sm-6">--}}
    {{--                        <ol class="breadcrumb float-sm-right">--}}
    {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
    {{--                            <li class="breadcrumb-item active">Validation</li>--}}
    {{--                        </ol>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div><!-- /.container-fluid -->--}}
    {{--        </section>--}}

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary mt-3">
                            <div class="card-header">
                                <h3 class="card-title">{{$title}}</h3>
                            </div>
                            @yield('content')
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0-rc
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
@include('admin.footer')
</body>
</html>
