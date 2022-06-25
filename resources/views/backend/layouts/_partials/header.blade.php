<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Osama Sejoal</title>

    <link href="{{ asset('backend/assets') }}/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png"
        sizes="144x144">
    <link href="{{ asset('backend/assets') }}/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png"
        sizes="114x114">
    <link href="{{ asset('backend/assets') }}/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png"
        sizes="72x72">
    <link href="{{ asset('backend/assets') }}/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="{{ asset('backend/assets') }}/img/favicon.png" rel="icon" type="image/png">
    <link href="{{ asset('backend/assets') }}/img/favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/lib/lobipanel/lobipanel.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/separate/vendor/lobipanel.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/lib/jqueryui/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/separate/pages/widgets.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/main.css">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/lib/font-awesome/css/all.min.css">

    {{-- Bootstrap toggle --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <style>
        .status-change-toggle .toggle {
            max-width: 44%;
            max-height: 44%;
        }

        .status-change-toggle {
            height: 100px !important;
        }

        /* Style for message page */
        .message-wrap {
            box-shadow: 0 0 3px #ddd;
            padding: 0;
        }

        .msg {
            padding: 5px;
            /*border-bottom:1px solid #ddd;*/
            margin: 0;
        }

        .msg-wrap {
            padding: 10px;
            max-height: 80vh;
            overflow: auto;
        }

        .time {
            color: #bfbfbf;
        }

        .msg-wrap .media-heading {
            color: #003bb3;
            font-weight: 700;
        }

        .msg-date {
            background: none;
            text-align: center;
            color: #aaa;
            border: none;
            box-shadow: none;
            border-bottom: 1px solid #ddd;
        }

        body::-webkit-scrollbar {
            width: 12px;
        }

        /* Let's get this party started */
        ::-webkit-scrollbar {
            width: 6px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #ddd;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        ::-webkit-scrollbar-thumb:window-inactive {
            background: #ddd;
        }

        .msg:last-child {
            border-bottom: 0 !important
        }
    </style>
</head>

<body class="with-side-menu control-panel control-panel-compact">

    <header class="site-header">
        <div class="container-fluid">
            <a href="#" class="site-logo">
                {{-- <img class="hidden-md-down" src="{{ asset('backend/assets/img') }}/logo-2.png" alt=""> --}}
                {{-- <img class="hidden-lg-down" src="{{ asset('backend/assets/img') }}/logo-2-mob.png" alt=""> --}}

                <img class="hidden-md-down"
                    src="{{ asset('backend/assets/images/company-info/' . company_info()->logo) }}" alt="">
                {{-- {{ company_info()->phone }} --}}

            </a>

            <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                <span>toggle menu</span>
            </button>

            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>


            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">

                        <!-- Notifications -->
                        <div class="dropdown dropdown-notification notif">
                            <a href="#" class="header-alarm dropdown-toggle active" id="dd-notification"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-icon-alarm"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif"
                                aria-labelledby="dd-notification">
                                <div class="dropdown-menu-notif-header">
                                    Notifications
                                    <span class="label label-pill label-danger">4</span>
                                </div>
                                <div class="dropdown-menu-notif-list">
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="{{ asset('backend/assets/img') }}/photo-64-1.jpg"
                                                alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Morgan</a> was bothering about something
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="{{ asset('backend/assets/img') }}/photo-64-2.jpg"
                                                alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Lioneli</a> had commented on this <a href="#">Super
                                            Important
                                            Thing</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="{{ asset('backend/assets/img') }}/photo-64-3.jpg"
                                                alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Xavier</a> had commented on the <a href="#">Movie
                                            title</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="{{ asset('backend/assets/img') }}/photo-64-4.jpg"
                                                alt="">
                                        </div>
                                        <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with
                                        you to see <a href="#">This Movie</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-notif-more">
                                    <a href="#">See more</a>
                                </div>
                            </div>
                        </div>

                        <!-- Messages -->
                        <div class="dropdown dropdown-notification messages">
                            <a href="#" class="header-alarm dropdown-toggle active" id="dd-messages"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-icon-mail"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages"
                                aria-labelledby="dd-messages">
                                <div class="dropdown-menu-messages-header">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab-incoming"
                                                role="tab">
                                                Inbox
                                                <span class="label label-pill label-danger">8</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab-outgoing"
                                                role="tab">Outbox</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-incoming" role="tabpanel">
                                        <div class="dropdown-menu-messages-list">
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="{{ asset('backend/assets/img') }}/photo-64-2.jpg"
                                                        alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about
                                                    something!</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="{{ asset('backend/assets/img') }}/avatar-2-64.png"
                                                        alt=""></span>
                                                <span class="mess-item-name">Christian Burton</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!
                                                    Morgan was bothering about something.</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="{{ asset('backend/assets/img') }}/photo-64-2.jpg"
                                                        alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about
                                                    something!</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="{{ asset('backend/assets/img') }}/avatar-2-64.png"
                                                        alt=""></span>
                                                <span class="mess-item-name">Christian Burton</span>
                                                <span class="mess-item-txt">Morgan was bothering about
                                                    something...</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-outgoing" role="tabpanel">
                                        <div class="dropdown-menu-messages-list">
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="{{ asset('backend/assets/img') }}/avatar-2-64.png"
                                                        alt=""></span>
                                                <span class="mess-item-name">Christian Burton</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!
                                                    Morgan was bothering about something...</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="{{ asset('backend/assets/img') }}/photo-64-2.jpg"
                                                        alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!
                                                    Morgan was bothering about something.</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="{{ asset('backend/assets/img') }}/avatar-2-64.png"
                                                        alt=""></span>
                                                <span class="mess-item-name">Christian Burtons</span>
                                                <span class="mess-item-txt">Morgan was bothering about
                                                    something!</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="{{ asset('backend/assets/img') }}/photo-64-2.jpg"
                                                        alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about
                                                    something!</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-notif-more">
                                    <a href="#">See more</a>
                                </div>
                            </div>
                        </div>

                        <!-- Profile -->
                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('backend/assets/img') }}/avatar-2-64.png" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                <a class="dropdown-item" href="{{ route('frontpage') }}"><span style="color:grey;"
                                        class="font-icon fa fa-newspaper-o"></span>Front page</a>

                                {{-- Profile --}}
                                <a class="dropdown-item" href="#">
                                    <span class="font-icon glyphicon glyphicon-user"></span>
                                    Profile
                                </a>

                                {{-- Settings --}}
                                <a class="dropdown-item" href="#">
                                    <span class="font-icon glyphicon glyphicon-cog"></span>
                                    Settings
                                </a>

                                {{-- Help --}}
                                <a class="dropdown-item" href="#">
                                    <span class="font-icon glyphicon glyphicon-question-sign"></span>
                                    Help
                                </a>


                                <div class="dropdown-divider"></div>

                                {{-- Logout --}}
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    <span class="font-icon glyphicon glyphicon-log-out"></span>
                                    Logout
                                </a>

                                <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                
                            </div>
                        </div>

                    </div>
                    <!--.site-header-shown-->

                </div>
                <!--site-header-content-in-->
            </div>
            <!--.site-header-content-->
        </div>
        <!--.container-fluid-->
    </header>
    <!--.site-header-->



    <!-- ||||||||||||||||||||||
            LEFT SIDEBAR
    ||||||||||||||||||||||| -->
    <div class="mobile-menu-left-overlay"></div>
    <nav class="side-menu">
        <ul class="side-menu-list">

            {{-- Dashboard --}}
            <li class="purple">
                <a href="{{ route('home') }}">
                    <i class="font-icon font-icon-dashboard"></i>
                    <span class="lbl">Dashboard</span>
                </a>
            </li>

            {{-- Messages --}}
            <li class="purple">
                <a href="{{ route('view.messages') }}">
                    <i class="font-icon font-icon-comments {{ !unread_messages()->isEmpty() ? 'active' : '' }}"></i>
                    <span class="lbl">Messages</span>
                    <span
                        class="label label-custom label-pill label-danger">{{ count(unread_messages()) >= 1 ? count(unread_messages()) : '' }}</span>
                </a>
            </li>

            {{-- Banner --}}
            <li class="purple">
                <a href="{{ route('banner.index') }}">
                    <i class="font-icon font-icon-player-subtitres"></i>
                    <span class="lbl">Banner</span>
                </a>
            </li>

            {{-- Trusted By Companies --}}
            <li class="purple with-sub">
                <span>
                    <i class="font-icon font-icon-notebook-bird"></i>
                    <span class="lbl">Trusted By Companies</span>
                </span>
                <ul>
                    <li><a href="{{ route('tbc.create') }}"><span class="lbl">Add Companies</span></a></li>
                    <li><a href="{{ route('tbc.index') }}"><span class="lbl">View Companies</span></a></li>
                </ul>
            </li>

            {{-- Service --}}
            <li class="purple with-sub">
                <span>
                    <i class="font-icon font-icon-widget"></i>
                    <span class="lbl">Service</span>
                </span>
                <ul>
                    <li><a href="{{ route('service.create') }}"><span class="lbl">Add Service</span></a>
                    </li>
                    <li><a href="{{ route('service.index') }}"><span class="lbl">View Service</span></a>
                    </li>
                </ul>
            </li>

            {{-- Testimonial --}}
            <li class="purple with-sub">
                <span>
                    <i class="font-icon font-icon-award"></i>
                    <span class="lbl">Testimonial</span>
                </span>
                <ul>
                    <li><a href="{{ route('testimonial.create') }}"><span class="lbl">Add
                                Testimonial</span></a></li>
                    <li><a href="{{ route('testimonial.index') }}"><span class="lbl">View
                                Testimonial</span></a></li>
                </ul>
            </li>

            {{-- FAQ --}}
            <li class="purple with-sub">
                <span>
                    <i class="font-icon font-icon-question"></i>
                    <span class="lbl">FAQ</span>
                </span>
                <ul>
                    <li><a href="{{ route('faq.create') }}"><span class="lbl">Add FAQ</span></a></li>
                    <li><a href="{{ route('faq.index') }}"><span class="lbl">View FAQ</span></a></li>
                </ul>
            </li>

            {{-- Company Info and Social --}}
            <li class="purple with-sub">
                <span>
                    <i class="font-icon font-icon-build"></i>
                    <span class="lbl">Company</span>
                </span>
                <ul>
                    <li><a href="{{ route('info.edit') }}"><span class="lbl">Info</span></a></li>
                    <li><a href="{{ route('social.index') }}"><span class="lbl">Social</span></a></li>
                </ul>
            </li>





            {{-- Nested menu --}}
            {{-- <li class="grey with-sub">
	            <span>
	                <span class="font-icon font-icon-burger"></span>
	                <span class="lbl">Nested Menu</span>
	            </span>
	            <ul>
	                <li><a href="#"><span class="lbl">Level 1</span></a></li>
	                <li><a href="#"><span class="lbl">Level 1</span></a></li>
	                <li class="with-sub">
	                    <span>
	                        <span class="lbl">Level 2</span>
	                    </span>
	                    <ul>
	                        <li><a href="#"><span class="lbl">Level 2</span></a></li>
	                        <li><a href="#"><span class="lbl">Level 2</span></a></li>
	                        <li class="with-sub">
	                            <span>
	                                <span class="lbl">Level 3</span>
	                            </span>
	                            <ul>
	                                <li><a href="#"><span class="lbl">Level 3</span></a></li>
	                                <li><a href="#"><span class="lbl">Level 3</span></a></li>
	                            </ul>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
	        </li> --}}


        </ul>

    </nav>
    <!--.side-menu-->



    <!-- ||||||||||||||||||||||
            MAIN CONTENT
    ||||||||||||||||||||||| -->
