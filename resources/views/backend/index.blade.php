<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/table_data_tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2019 16:26:45 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{config('app.name')}} | {{$title['title']}}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('balivisas.png')}}" />
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('backend/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

    <link href="{{asset('backend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="{{asset('backend/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" width="50px" src="{{asset('balivisas.png')}}"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                            <span class="text-muted text-xs block">@if(Auth::user()->is_admin==1)Admin @else User @endif <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="{{route('update.profile.'.Auth::user()->is_admin)}}">Profile</a></li>
                            <li><a class="dropdown-item" href="">Contacts</a></li>
                            <li><a class="dropdown-item" href="">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" onclick="logout()"">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        BV
                    </div>
                </li>
                <li>
                    <a href="@if(Auth::user()->is_admin == 1){{route('dashboard.1')}}@else{{route('dashboard.0')}}@endif"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
                    {{-- <ul class="nav nav-second-level collapse">
                        <li><a href="index.html">Dashboard v.1</a></li>
                        <li><a href="dashboard_2.html">Dashboard v.2</a></li>
                        <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                        <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                        <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
                    </ul> --}}
                </li>
                @if(Auth::user()->is_admin == '1')
                <li>
                    <a href="{{route('user')}}"><i class="fa fa-user"></i> <span class="nav-label">User Data</span><span class="label label-warning float-right">{{App\Models\User::count()}}</span></a>
                </li>
                @endif
                <li>
                    <a href="{{route('article.'.Auth::user()->is_admin)}}"><i class="fa fa-book"></i> <span class="nav-label">Articles</span><span class="label label-warning float-right">{{App\Models\Article::count()}}</span></a>
                </li>
                <li>
                    <a href="{{route('team.'.Auth::user()->is_admin)}}"><i class="fa fa-user-circle-o"></i> <span class="nav-label">Team</span><span class="label label-warning float-right">{{App\Models\Team::count()}}</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Gallery </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="{{route('carousel.'.Auth::user()->is_admin)}}">Carosel <span class="label label-warning float-right">{{App\Models\Carousel::count()}}</span></a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.8/search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                @if($message = Session::get('error'))
                <li style="margin-top: 10px;margin-right: 200px;">
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"> ×</button>    
                        <strong style="color: red;">{{$message}}</strong>
                    </div>
                </li>
                @endif
                @if($message = Session::get('success'))
                <li style="margin-top: 10px;margin-right: 200px;">
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"> ×</button>    
                        <strong>{{$message}}</strong>
                    </div>
                </li>
                @endif
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Balivisas</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    {{-- <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="float-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html" class="dropdown-item">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul> --}}
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    {{-- <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="profile.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="float-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="grid_options.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html" class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul> --}}
                </li>


                <li>
                    <button class="btn btn-danger" onclick="logout()"><i class="fa fa-sign-out"></i> Log out</button>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>{{$title['title']}}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="@if(Auth::user()->is_admin == 1){{route('dashboard.1')}}@else{{route('dashboard.0')}}@endif">Home</a>
                        </li>
                        <li class="breadcrumb-item" active>
                            <a href="{{route($title['route'])}}">{{$title['title']}}</a>
                        </li>
                        {{-- <li class="breadcrumb-item active">
                            <strong>Data Tables</strong>
                        </li> --}}
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        
        @yield('content')    
        @include('sweetalert::alert')
        <div class="footer">
            <div>
                <strong>Copyright</strong> Balivisas &copy; {{date('Y')}}
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="{{asset('backend/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('backend/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('backend/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('backend/js/inspinia.js')}}"></script>
    <script src="{{asset('backend/js/plugins/pace/pace.min.js')}}"></script>
    <!-- Sweet alert -->
    <script src="{{asset('backend/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
<script>

    $(document).ready(function () {

        $('.demo1').click(function(){
            swal({
                title: "Welcome in Alerts",
                text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry."
            });
        });

        $('.demo2').click(function(){
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                type: "success"
            });
        });

        $('.demo3').click(function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        });

        $('.logout').click(function () {
            swal({
                        title: "Are you sure?",
                        text: "You will logout from this system",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            document.location.href="{!! route('logout'); !!}";
                        } else {
                            swal("Cancelled", "Thank you", "error");
                        }
                    });
        });

    });

</script>
<script type="text/javascript">

    function deleteConfirmation(id) {
        swal({
            title: "Are you sure?",
            text: "You will delete this id "+id+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location="delete-article/id="+id+""
                swal(" Article has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your Article file is safe!");
            }
        });
    }

    function deleteCarousel(id) {
        swal({
            title: "Are you sure?",
            text: "You will delete this id "+id+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location="delete-carousel/id="+id+""
                swal(" Carousel has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your Carousel file is safe!");
            }
        });
    }

    function deleteTeam(id) {
        swal({
            title: "Are you sure?",
            text: "You will delete this id "+id+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location="delete-team/id="+id+""
                swal(" Team has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your Team file is safe!");
            }
        });
    }

    function deleteUser(id) {
        swal({
            title: "Are you sure?",
            text: "You will delete this user "+id+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location="delete/id="+id+""
                swal(" Team has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your Team file is safe!");
            }
        });
    }
    function logout() {
        swal({
            title: "Are you sure?",
            text: "You will close this system",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location="{{route('logout')}}"
                swal(" Good bye", {
                icon: "success",
                });
            } else {
                swal("Thank you");
            }
        });
    }


</script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/table_data_tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2019 16:26:46 GMT -->
</html>
