<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

    <!-- Favicon -->
    <link rel="icon" href="/assets/img/brand/favicon.ico" type="image/x-icon"/>

    <!-- Title -->
    <title>Os Cascos</title>

    <!-- Bootstrap css-->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Icons css-->
    <link href="/assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
    <link href="/assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>

    <!-- Style css-->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/map.css" rel="stylesheet">
    <link href="/assets/css/skins.css" rel="stylesheet">
    <link href="/assets/css/dark-style.css" rel="stylesheet">
    <link href="/assets/css/colors/default.css" rel="stylesheet">

    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="/assets/css/colors/color.css">

    <!-- Select2 css-->
    <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet">

    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="/assets/plugins/multipleselect/multiple-select.css">

    <!-- Sidemenu css-->
    <link href="/assets/css/sidemenu/sidemenu2.css" rel="stylesheet">

    @yield('css')
</head>

<body class="main-body leftmenu">

<!-- Loader -->
<div id="global-loader">
    <img src="/assets/img/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->


<!-- Page -->
<div class="page">

    <!-- Sidemenu -->
    <div class="main-sidebar main-sidebar-sticky side-menu">
        <div class="sidemenu-logo">
            <a class="main-logo" href="index.html">
                <img src="/assets/img/brand/logo-light.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="/assets/img/brand/icon-light.png" class="header-brand-img icon-logo" alt="logo" style="width: 45px;">
                <img src="/assets/img/brand/logo.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
                <img src="/assets/img/brand/icon.png" class="header-brand-img icon-logo theme-logo" alt="logo" style="width: 45px;">
            </a>
        </div>
        <div class="main-sidebar-body">
            <ul class="nav">
                <li class="nav-header"><span class="nav-label">Dashboard</span></li>
                <li class="nav-item">
                    <a class="nav-link" href="/home"><span class="shape1"></span><span class="shape2"></span><i
                            class="ti-home sidemenu-icon "></i><span class="sidemenu-label">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ocorrencias"><span class="shape1"></span><span class="shape2"></span><i
                            class="ti-shopping-cart-full sidemenu-icon"></i><span class="sidemenu-label">Ocorrências</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/usuarios"><span class="shape1"></span><span class="shape2"></span><i
                            class="ti-user sidemenu-icon"></i><span class="sidemenu-label">Usuarios</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Sidemenu -->

    <!-- Main Header-->
    <div class="main-header side-header sticky">
        <div class="container-fluid">
            <div class="main-header-left">
                <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
            </div>
            <div class="main-header-right">
                <div class="dropdown header-search">
                    <a class="nav-link icon header-search">
                        <i class="fe fe-search header-icons"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-form-search p-2">
                            <div class="input-group">
                                <div class="input-group-btn search-panel">
                                    <select class="form-control select2-no-search">
                                        <option label="All categories">
                                        </option>
                                        <option value="IT Projects">
                                            IT Projects
                                        </option>
                                        <option value="Business Case">
                                            Business Case
                                        </option>
                                        <option value="Microsoft Project">
                                            Microsoft Project
                                        </option>
                                        <option value="Risk Management">
                                            Risk Management
                                        </option>
                                        <option value="Team Building">
                                            Team Building
                                        </option>
                                    </select>
                                </div>
                                <input type="search" class="form-control" placeholder="Search for anything...">
                                <button class="btn search-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown d-md-flex">
                    <a class="nav-link icon full-screen-link" href="">
                        <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                        <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                    </a>
                </div>
                <div class="dropdown main-header-notification">

                    <a class="nav-link icon" href="">
                        <i class="fe fe-bell header-icons"></i>
                        @if(auth()->user()->unreadnotifications->count() > 0)
                        <span class="badge badge-danger nav-link-badge">{{auth()->user()->unreadnotifications->count()}}</span>
                        @endif
                    </a>

                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <p class="main-notification-text">Você tem {{auth()->user()->unreadnotifications->count()}} {{auth()->user()->unreadnotifications->count() > 1 || auth()->user()->unreadnotifications->count() === 0?"notificações não lidas":"notificação não lida"}} </p>
                        </div>
                        <div class="main-notification-list">
                            @foreach(auth()->user()->unreadnotifications()->limit(5)->get() as $n)
                            {{getNotificationHtmlporTipo($n)}}
                            @endforeach
                        </div>
{{--                        <div class="dropdown-footer">--}}
{{--                            <a href="#">Ver todas notificações</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="dropdown main-profile-menu">
                    <a class="d-flex" href="">
                        <span class="main-img-user"><img alt="avatar" src="{{auth()->user()->profile_image_url}}"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <h6 class="main-notification-title">{{auth()->user()->name}}</h6>
                            <p class="main-notification-text">Administrador</p>
                        </div>
                        <a class="dropdown-item border-top" href="/usuarios/{{auth()->user()->id}}/perfil">
                            <i class="fe fe-user"></i> Meu perfil
                        </a>
                        <a class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fe fe-power"></i> Sair

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </a>
                    </div>
                </div>
                <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent-4"
                        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                </button><!-- Navresponsive closed -->
            </div>
        </div>
    </div>
    <!-- End Main Header-->

    <!-- Mobile-header -->
    <div class="mobile-main-header">
        <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <div class="d-flex order-lg-2 ml-auto">
                    <div class="dropdown header-search">
                        <a class="nav-link icon header-search">
                            <i class="fe fe-search header-icons"></i>
                        </a>
                        <div class="dropdown-menu">
                            <div class="main-form-search p-2">
                                <div class="input-group">
                                    <div class="input-group-btn search-panel">
                                        <select class="form-control select2-no-search">
                                            <option label="All categories">
                                            </option>
                                            <option value="IT Projects">
                                                IT Projects
                                            </option>
                                            <option value="Business Case">
                                                Business Case
                                            </option>
                                            <option value="Microsoft Project">
                                                Microsoft Project
                                            </option>
                                            <option value="Risk Management">
                                                Risk Management
                                            </option>
                                            <option value="Team Building">
                                                Team Building
                                            </option>
                                        </select>
                                    </div>
                                    <input type="search" class="form-control" placeholder="Search for anything...">
                                    <button class="btn search-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown ">
                        <a class="nav-link icon full-screen-link">
                            <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                            <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                        </a>
                    </div>
                    <div class="dropdown main-header-notification">
                        <a class="nav-link icon" href="">
                            <i class="fe fe-bell header-icons"></i>
                            <span class="badge badge-danger nav-link-badge">4</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <p class="main-notification-text">You have 1 unread notification<span
                                        class="badge badge-pill badge-primary ml-3">View all</span></p>
                            </div>
                            <div class="main-notification-list">
                                <div class="media new">
                                    <div class="main-img-user online"><img alt="avatar" src="/assets/img/users/5.jpg">
                                    </div>
                                    <div class="media-body">
                                        <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="main-img-user"><img alt="avatar" src="/assets/img/users/2.jpg"></div>
                                    <div class="media-body">
                                        <p><strong>Joshua Gray</strong> New Message Received</p>
                                        <span>Oct 13 02:56am</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="main-img-user online"><img alt="avatar" src="/assets/img/users/3.jpg">
                                    </div>
                                    <div class="media-body">
                                        <p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-footer">
                                <a href="#">View All Notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="main-header-notification mt-2">
                        <a class="nav-link icon" href="chat.html">
                            <i class="fe fe-message-square header-icons"></i>
                            <span class="badge badge-success nav-link-badge">6</span>
                        </a>
                    </div>
                    <div class="dropdown main-profile-menu">
                        <a class="d-flex" href="#">
                            <span class="main-img-user"><img alt="avatar" src="/assets/img/users/1.jpg"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <h6 class="main-notification-title">Sonia Taylor</h6>
                                <p class="main-notification-text">Web Designer</p>
                            </div>
                            <a class="dropdown-item border-top" href="profile.html">
                                <i class="fe fe-user"></i> My Profile
                            </a>
                            <a class="dropdown-item" href="profile.html">
                                <i class="fe fe-edit"></i> Edit Profile
                            </a>
                            <a class="dropdown-item" href="profile.html">
                                <i class="fe fe-settings"></i> Account Settings
                            </a>
                            <a class="dropdown-item" href="profile.html">
                                <i class="fe fe-settings"></i> Support
                            </a>
                            <a class="dropdown-item" href="profile.html">
                                <i class="fe fe-compass"></i> Activity
                            </a>
                            <a class="dropdown-item" href="signin.html">
                                <i class="fe fe-power"></i> Sign Out
                            </a>
                        </div>
                    </div>
                    <div class="dropdown  header-settings">
                        <a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                            <i class="fe fe-align-right header-icons"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile-header closed -->
    <div class="main-content side-content pt-0">
        @yield('content')
    </div>

<!-- Sidebar -->
    <div class="sidebar sidebar-right sidebar-animate">
        <div class="sidebar-icon">
            <a href="#" class="text-right float-right text-dark fs-20" data-toggle="sidebar-right"
               data-target=".sidebar-right"><i class="fe fe-x"></i></a>
        </div>
        <div class="sidebar-body">
            <h5>Todo</h5>
            <div class="d-flex p-3">
                <label class="ckbox"><input checked type="checkbox"><span>Hangout With friends</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input checked type="checkbox"><span>System Updated</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input type="checkbox"><span>Do something more</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input type="checkbox"><span>System Updated</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input type="checkbox"><span>Find an Idea</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top mb-0">
                <label class="ckbox"><input type="checkbox"><span>Project review</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                               data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <h5>Overview</h5>
            <div class="p-4">
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Founder &amp; CEO</span> <span>24</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20"
                             class="progress-bar progress-bar-xs wd-20p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>UX Designer</span> <span>1</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="15"
                             class="progress-bar progress-bar-xs bg-secondary wd-15p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Recruitment</span> <span>87</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="45"
                             class="progress-bar progress-bar-xs bg-success wd-45p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Software Engineer</span> <span>32</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25"
                             class="progress-bar progress-bar-xs bg-info wd-25p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Project Manager</span> <span>32</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25"
                             class="progress-bar progress-bar-xs bg-danger wd-25p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top" class="color-button-primary"><i class="fe fe-arrow-up"></i></a>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Jquery js-->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap js-->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Internal Chart.Bundle js-->
<script src="/assets/plugins/chart.js/Chart.bundle.min.js"></script>

<!-- Peity js-->
<script src="/assets/plugins/peity/jquery.peity.min.js"></script>

<!-- Select2 js-->
<script src="/assets/plugins/select2/js/select2.min.js"></script>

<!-- Perfect-scrollbar js -->
<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- Sidemenu js -->
<script src="/assets/plugins/sidemenu/sidemenu2.js"></script>

<!-- Sidebar js -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>

<!-- Internal Morris js -->
<script src="/assets/plugins/raphael/raphael.min.js"></script>
<script src="/assets/plugins/morris.js/morris.min.js"></script>


<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!-- Custom js -->
<script src="/assets/js/custom.js"></script>

@yield('scripts')

</body>
</html>
