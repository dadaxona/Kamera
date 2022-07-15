<!DOCTYPE html>
<html lang="en">

<head>
    <title>HiLook</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      {{-- <link rel="stylesheet" href="{{ asset('aweetalert2/sweetalert2.min.css') }}"> --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <style>
        .extr22{
            height: 346px;
        }
        .extr223{
            height: 260px;
        }
        .epam{
            height: 500px;
        }
        .tab{
            width: 100%;
            margin: 5px; 
        }
        .ext{
            height: 460px;
        }
        .scrolll2{
            overflow-x: auto;
        }

        .rty2{
            width: 100%;
        }
        .exstrapro{
            height: 550px;
        }
        .wizzz{
            width: 150%;
        }
        #post{
            background-color: white;
            display: none;
            border-radius: 12px;
            border: 1px solid;
            width: 99%;
            margin: auto;
            position: absolute;
        }
        .buts{
            height: 35px;
            padding: 7px;
        }
        #feedback { font-size: 1.4em; }
    #tbody2 .ui-selecting { background: #277890; }
    #tbody2 .ui-selected { background: #277890; color: white; }
    #tbody2 { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #tbody2 tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #ttbody .ui-selecting { background: #277890; }
    #ttbody .ui-selected { background: #277890; color: white; }
    #ttbody { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #ttbody tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #clent .ui-selecting { background: #277890; }
    #clent .ui-selected { background: #277890; color: white; }
    #clent { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #clent tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #savdobirlamchi .ui-selecting { background: #277890; }
    #savdobirlamchi .ui-selected { background: #277890; color: white; }
    #savdobirlamchi { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #savdobirlamchi tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #dolg .ui-selecting { background: #277890; }
    #dolg .ui-selected { background: #277890; color: white; }
    #dolg { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #dolg tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #savdo .ui-selecting { background: #277890; }
    #savdo .ui-selected { background: #277890; color: white; }
    #savdo { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #savdo tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #clent_tip .ui-selecting { background: #277890; }
    #clent_tip .ui-selected { background: #277890; color: white; }
    #clent_tip { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #clent_tip tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #zaqazz123 .ui-selecting { background: #277890; }
    #zaqazz123 .ui-selected { background: #277890; color: white; }
    #zaqazz123 { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #zaqazz123 tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #imya .ui-selecting { background: #277890; }
    #imya .ui-selected { background: #277890; color: white; }
    #imya { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #imya tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #tbody .ui-selecting { background: #277890; }
    #tbody .ui-selected { background: #277890; color: white; }
    #tbody { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #tbody tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #tbody3 .ui-selecting { background: #277890; }
    #tbody3 .ui-selected { background: #277890; color: white; }
    #tbody3 { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #tbody3 tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #tavar_tip .ui-selecting { background: #277890; }
    #tavar_tip .ui-selected { background: #277890; color: white; }
    #tavar_tip { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #tavar_tip tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #tavarlar .ui-selecting { background: #277890; }
    #tavarlar .ui-selected { background: #277890; color: white; }
    #tavarlar { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #tavarlar tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

    #feedback { font-size: 1.4em; }
    #malumotser .ui-selecting { background: #277890; }
    #malumotser .ui-selected { background: #277890; color: white; }
    #malumotser { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #malumotser tr { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
    </style>

  </head>
  <body>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="index.html">
                          <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" />
                          {{-- <h5 style="color: #eff0f3">HiLook</h5> --}}
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a onclick="reflesh()" class="waves-effect waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                  </svg>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                        @if ($jonatilgan > 0)
                        <li class="header-notification">
                            <a href="#" class="waves-effect waves-light">
                                <i class="ti-bell"></i>
                                <span class="badge bg-c-red"></span>
                            </a>
                            @if ($sana2)
                            <ul class="show-notification">
                                <li>
                                    <a href="{{ route('kelgantovar2') }}" class="waves-effect waves-light">
                                         <h6>Товар жонатилди</h6>
                                        <label class="label label-danger">New</label>
                                    </a>
                                </li>
                                <ul class="show-notification">
                                    <li>
                                        <a onclick="tugilgankun({{ $sana2->id }})" class="waves-effect waves-light">
                                            <h6>Клентнинг тугилган куни</h6>
                                            <label class="label label-danger">New</label>
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                            @else
                            <ul class="show-notification">
                            <li>
                                <a href="{{ route('kelgantovar2') }}" class="waves-effect waves-light">
                                  <h6>Товар жонатилди</h6>
                                    <label class="label label-danger">New</label>
                                  </a>
                                </li>
                            </ul>
                            @endif
                        </li>                            
                        @else
                            @if ($sana2)
                            <li class="header-notification">
                                <a href="#" class="waves-effect waves-light">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-red"></span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                    <a onclick="tugilgankun({{ $sana2->id }})" class="waves-effect waves-light">
                                        <h6>Клентнинг тугилган куни</h6>
                                        <label class="label label-danger">New</label>
                                        </a>
                                    </li>
                                </ul>
                            </li>         
                            @else
                            <li class="header-notification">
                                <a href="#" class="waves-effect waves-light">
                                    <i class="ti-bell"></i>
                                    <span class=""></span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                    <a href="#" class="waves-effect waves-light">
                                        <h6>Жонатилган товар йок</h6>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        @endif
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="assets/images/a.jpg" class="img-radius" alt="User-Profile-Image">
                                  <span>{{ $brends->login }}</span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <li class="waves-effect waves-light">
                                      <a href="{{ route('setting') }}">
                                          <i class="ti-settings"></i> Settings
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="{{ route('profil') }}">
                                          <i class="ti-user"></i> Profile
                                      </a>
                                  </li>                           
                                  <li class="waves-effect waves-light">
                                      <a href="/logaut">
                                          <i class="ti-layout-sidebar-left"></i> Logout
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="assets/images/a.jpg" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">{{ $brends->login }}<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="{{ route('profil') }}"><i class="ti-user"></i>View Profile</a>
                                          <a href="{{ route('setting') }}"><i class="ti-settings"></i>Settings</a>
                                          <a href="/logaut"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="p-15 p-b-0">
                              <form class="form-material">
                                  <div class="form-group form-primary">
                                      <input type="text" name="footer-email" class="form-control" required="">
                                      <span class="form-bar"></span>
                                      <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                                  </div>
                              </form>
                          </div>
                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Расположение</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="active">
                                  <a href="/glavninachal" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>Д</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Дашборд</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>                               
                                <li class="">
                                    <a href="{{ route('index') }}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Создать коталог</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                <a href="{{ route('indextip') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Создать Товар</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('index2') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Создать Поставшик</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('edit3') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Создать Закупки</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('clents') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Создать Клиент</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                          </ul>                 
        
                          <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Статистика</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="{{ route('clent2') }}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Продача</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('sqlad.php') }}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Перемещение</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('setting') }}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Settings</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                      </div>
                  </nav>
                  <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper p-2">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <a href="/glavninachal">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-10">
                                                                <h5 class="text-c-purple">Продажи</h5>
                                                            </div>
                                                            <div class="col-2 text-right">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                                                  </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="card-footer bg-c-purple">
                                                            <div class="row align-items-center">
                                                                <div class="col-9">
                                                                    <p class="text-white m-b-0">Сотув булими</p>
                                                                </div>
                                                                <div class="col-3 text-right">
                                                                    <i class="fa fa-line-chart text-white f-16"></i>
                                                                </div>
                                                            </div>            
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <a href="{{ route('ombor') }}">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-10">
                                                                <h5 class="text-c-green">Складские операции</h5>
                                                            </div>
                                                            <div class="col-2 text-right">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-server" viewBox="0 0 16 16">
                                                                    <path d="M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z"/>
                                                                    <path d="M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.667V6.334a6.51 6.51 0 0 1-1.458.79C11.81 7.684 9.967 8 8 8c-1.966 0-3.809-.317-5.208-.876a6.508 6.508 0 0 1-1.458-.79z"/>
                                                                    <path d="M14.667 11.668a6.51 6.51 0 0 1-1.458.789c-1.4.56-3.242.876-5.21.876-1.966 0-3.809-.316-5.208-.876a6.51 6.51 0 0 1-1.458-.79v1.666C1.333 14.806 4.318 16 8 16s6.667-1.194 6.667-2.667v-1.665z"/>
                                                                  </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Омборхона операциялари</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                               <a href="{{ route('adress') }}">
                                                <div class="card-block">
                                                    <div class="row align-items-center">
                                                        <div class="col-10">
                                                            <h5 class="text-c-blue">Справочники</h5>
                                                        </div>
                                                        <div class="col-2 text-right">
                                                            <i class="fa fa-calendar-check-o f-28"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-c-blue">
                                                    <div class="row align-items-center">
                                                        <div class="col-9">
                                                            <p class="text-white m-b-0">Маълумотлар</p>
                                                        </div>
                                                        <div class="col-3 text-right">
                                                            <i class="fa fa-line-chart text-white f-16"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                               </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                               <a href="">
                                                <div class="card-block">
                                                    <div class="row align-items-center">
                                                        <div class="col-10">
                                                            <h5 class="text-c-red">Администирование</h5>
                                                        </div>
                                                        <div class="col-2 text-right">
                                                            <i class="fa fa-hand-o-down f-28"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-c-red">
                                                    <div class="row align-items-center">
                                                        <div class="col-9">
                                                            <p class="text-white m-b-0">Бошкару панел</p>
                                                        </div>
                                                        <div class="col-3 text-right">
                                                            <i class="fa fa-line-chart text-white f-16"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                               </a>
                                                </div>
                                            </div>
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function reflesh(){
            location.reload(true);
        }

    </script>
    <!-- Required Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    {{-- <script src="{{ asset('aweetalert2/sweetalert2.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="assets/pages/widget/amchart/gauge.js"></script>
    <script src="assets/pages/widget/amchart/serial.js"></script>
    <script src="assets/pages/widget/amchart/light.js"></script>
    <script src="assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/script.js "></script>
</body>

</html>
