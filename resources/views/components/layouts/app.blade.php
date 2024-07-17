<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/simple-calendar/simple-calendar.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>


    @livewireStyles()
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="{{ route('/') }}" class="logo">
                    <img src="{{ asset('assets/img/logo.png')}}" alt="Logo">
                </a>
                <a href="{{ route('/') }}" class="logo logo-small">
                    <img src="{{ asset('assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="{{ asset('assets/img/icons/header-icon-04.svg')}}" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <div class="user-text">
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="user-text">
                                <h6>User Name</h6>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>
                        <a class="dropdown-item" href="{{ route('inbox') }}">Inbox</a>
                        <a class="dropdown-item" href="">Logout</a>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}"><i class="feather-grid"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="{{ Request::is('teachers') ? 'active' : '' }}">
                            <a href="{{ route('teachers') }}"><i class="feather-users"></i>
                                <span>Teachers</span></a>
                        </li>
                        <li class="{{ Request::is('students') ? 'active' : '' }}">
                            <a href="{{ route('students') }}"><i class="fas fa-graduation-cap"></i>
                                <span>Students</span></a>
                        </li>
                        <li class="{{ Request::is('classes') ? 'active' : '' }}">
                            <a href="{{ route('classes') }}"><i class="fas fa-users"></i> <span>Classes &
                                    Streams</span></a>
                        </li>
                        <li class="{{ Request::is('subjects') ? 'active' : '' }}">
                            <a href="{{ route('subjects') }}"><i class="fas fa-book-open"></i> <span>Subjects &
                                    Topics</span></a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fas fa-chalkboard-teacher"></i>
                                <span>Assessments</span> <span class="menu-arrow"></span></a>
                            <ul>

                                <li class="{{ Request::is('enrollments') ? 'active' : '' }}">
                                    <a href="{{ route('enrollments') }}"><i class="fas fa-user-graduate"></i>
                                        <span>Enrollments</span></a>
                                </li>
                                <li class="{{ Request::is('topics') ? 'active' : '' }}">
                                    <a href="{{ route('topics') }}"><i class="fas fa-calendar-alt"></i> <span>AOIs &
                                            Activities</span></a>
                                </li>
                                <li class="{{ Request::is('exams') ? 'active' : '' }}">
                                    <a href="{{ route('exams') }}"><i class="fas fa-file-alt"></i>
                                        <span>Exams</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('reports') ? 'active' : '' }}">
                            <a href="{{ route('reports') }}"><i class="fas fa-chart-line"></i> <span>Reports</span></a>
                        </li>
                        <li class="{{ Request::is('settings') ? 'active' : '' }}">
                            <a href="{{ route('settings') }}"><i class="fas fa-cogs"></i> <span>Settings</span></a>
                        </li>
                        <li class="{{ Request::is('profile') ? 'active' : '' }}">
                            <a href="{{ route('profile') }}"><i class="fas fa-user"></i> <span>Profile</span></a>
                        </li>
                        <li class="{{ Request::is('login') ? 'active' : '' }}">
                            <a href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{ $slot }}
    </div>

    @livewireScripts()

    <script>
    Livewire.on('openEditModal', () => {
        const modal = new bootstrap.Modal(document.getElementById('addTeacherModal'));
        modal.show();
    });
    </script>


    <script>
    Livewire.on('openViewModal', () => {
        const modal = new bootstrap.Modal(document.getElementById('viewTeacherModal'));
        modal.show();
    });
    </script>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script> -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/plugins/c3-chart/d3.v5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/c3-chart/c3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/c3-chart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/plugins/countup/jquery.missofis-countdown.js') }}"></script>
    <script src="{{ asset('assets/plugins/simple-calendar/jquery.simple-calendar.js') }}"></script>
    <script src="{{ asset('assets/js/calander.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>


</body>



</html>