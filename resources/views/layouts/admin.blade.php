<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel blog Web application</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('public/admin') }}/packages/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('public/admin') }}/packages/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('public/admin') }}/packages/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- CodeMirror -->
    <!-- <link rel="stylesheet" href="{{ asset('public/admin') }}/packages/codemirror/codemirror.css">
    <link rel="stylesheet" href="{{ asset('public/admin') }}/packages/codemirror/theme/monokai.css"> -->
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('public/admin') }}/packages/simplemde/simplemde.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- alertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- alertify themes/default.min -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/admin') }}/css/adminlte.min.css">
    <!-- toastr css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- style.css  -->
    <link rel="stylesheet" href="{{ asset('public/admin') }}/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars">

                        </i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        @if($newmesssage)
                        <span class="badge badge-danger navbar-badge">{{ $newmesssage->count() }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @foreach($newmesssage as $message)
                        <a href="{{ route('contacet.viewmessage', ['id'=>$message->id] ) }}" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="@if( $message->image ) {{ asset('/storage/message')}} @else{{ asset('website/images/user.svg') }} @endif"
                                    alt="" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{ $message->name }}
                                        <span class="float-right text-sm text-secondary"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">{{ (Str::limit($message->subject, 10)) }}</b> -
                                        {{ ucfirst(strip_tags(Str::limit($message->message, 10))) }}..</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                        {{ $message->created_at->format('h:m')}} Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        @endforeach

                        @if($newmesssage)
                        <a href="{{route('contacet.index') }}" class="dropdown-item dropdown-footer">See All
                            Messages</a>
                        @else
                        <span class="dropdown-item dropdown-footer">No new Messages</span>
                        @endif


                    </div>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                
                <li class="ml-2 nav-item">
                    <!-- Brand Logo -->
                    <a href="{{ route('user.profile') }}">
                        <img height="30px" width="30px" class="rounded rounded-circle"
                            src="{{ asset('/storage/user/') }}{{ '/'.Auth::user()->image }}" alt="">
                        <!-- <i class="fa fa-home fa-2x"></i> -->
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off mr-2"> </i> {{ __('Logout') }}
                        </a>

                        @if (Route::has('register'))
                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                            <i class="fa fa-user mr-2"> </i>Profile
                        </a>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf

                        </form>
                    </div>

                </li>
                @endguest
            </ul>
        </nav>
        <!-- /.navbar -->
        @include('admin.includes.sidebar')
        @yield('content')
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2020 Develope by <a href="#">MD Munirujjaman</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('public/admin') }}/packages/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/admin') }}/packages/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="{{ asset('public/admin') }}/packages/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/admin') }}/packages/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('public/admin') }}/packages/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('public/admin') }}/packages/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/admin') }}/js/adminlte.min.js"></script>
    <!-- summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- CodeMirror -->
    <!-- <script src="{{ asset('public/admin') }}/packages/codemirror/codemirror.js"></script>
    <script src="{{ asset('public/admin') }}/packages/codemirror/mode/css/css.js"></script>
    <script src="{{ asset('public/admin') }}/packages/codemirror/mode/xml/xml.js"></script>
    <script src="{{ asset('public/admin') }}/packages/codemirror/mode/htmlmixed/htmlmixed.js"></script> -->
    <script src="{{ asset('public/admin') }}/packages/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('public/admin') }}/js/demo.js"></script>
    <!-- alertify -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Custom ajax code -->
    <script src="{{ asset('public/admin') }}/js/appAjax.js"></script>



    <!-- Page specific script -->
    <script>
    @if(Session::get('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    // CustomFileInput
    $(function() {
        bsCustomFileInput.init();
    });


    // tooltip
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    </script>
    <script>
    //  summernote
    $('#description').summernote({
        placeholder: 'Write a Description here...',
        tabsize: 2,
        height: 100
    });
    </script>



    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>