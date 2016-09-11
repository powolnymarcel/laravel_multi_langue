<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('backend/css/sb-admin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('backend/css/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('backend/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('sweetalert/dist/sweetalert.css')}}">
    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
@include('backend.layouts.navbar')
    <div id="page-wrapper">
        <div class="container-fluid">
            @include('backend.errors.message_error')
            @yield('content')
        </div>
        <!-- /.container-fluid -->
        <div class="modal fade" id="poma-modal"  role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                            x
                        </button>
                        <h4 class="modal-title">
                            Modal Title
                        </h4>
                    </div>

                    <div class="modal-body" id="poma-modal-content">

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('backend/js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('backend/js/plugins/morris/raphael.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/morris/morris-data.js')}}"></script>
<script src="{{asset('sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{asset('poma.js')}}"></script>
@yield('js')
@yield('scripts')
</body>

</html>
