<?php
    require 'conn.php';
    require '../GoogleClient.php';
    require '../calendar/quickstart/vendor/autoload.php';
    $conn = OpenCon();
    $client = getGoogleClient();
    session_start();
    $client->setAccessToken($_SESSION['access_token']);
    if($client->isAccessTokenExpired()) {
        $auth_url = $client->createAuthUrl();
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    }
    $service = new Google_Service_Calendar($client);
    $me= new Google_Service_Plus($client);
    $email = $me->people->get('me')->getEmails();
    $email = $email[0]['value'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    
    <title>AftReg</title>
    
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col" style="display: block">
            <div class="left_col scroll-view">
                    <a href="index.html" class="site_title"><img src="images/logo2.png" height="50" width="50"/><span>HASKALA</span></a>
                
                <div class="clearfix"></div>
                <!-- /menu profile quick info -->
                
                <br />
                
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li class="active"><a href=""><i class="fa fa-graduation-cap" ></i> Grades</a></li>
                            <li><a href=""><i class="fa fa-desktop"></i> Constraints</a></li>
                            <li><a href=""><i class="fa fa-bar-chart-o"></i> Justice</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>
        
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 208006999 <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right" dir="rtl">
                                <li><a href="javascript:;" dir="rtl">שנה סוג משתמש</a></li>
                                <li><a href="javascript:;">עזרה</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> יציאה</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        
        <!-- page content -->
        <div class="right_col" role="main" dir="rtl">
            <!-- top tiles -->
            <div class="row tile_count">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-crosshairs"></i> עמידה ביעדים</span>
                    <div class="count">74%</div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-thumbs-o-down"></i> כמה לירידה</span>
                    <div class="count red">2.46</div>
                    <span class="count_bottom">ל84.53</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-thumbs-o-up"></i></i> כמה לעליה</span>
                    <div class="count green">1.25</div>
                    <span class="count_bottom">ל87.34</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-trophy"></i> מקום במגמה</span>
                    <div class="count">5</div>
                    <span class="count_bottom">מתוך 14</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-line-chart"></i> נק"ז מצטבר </span>
                    <div class="count">89.5</div>
                    <span class="count_bottom">מתוך 120</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-graduation-cap"></i> ממוצע </span>
                    <div class="count">86.34</div>
                    <span class="count_bottom"></i>84.23</i> סמסטר קודם</span>
                </div>
            </div>
            <!-- /top tiles -->
            <div class="col-md-6 col-sm-6 col-xs-12" dir="rtl" style="text-align: center">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="float: right">ציונים </h2>
                        <ul class="nav navbar-right panel_toolbox">ערוך
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
</ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" >
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th style="text-align: center">קורס</th>
                                <th style="text-align: center">נק"ז</th>
                                <th style="text-align: center">ציון</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>גיודזיה</td>
                                <td>3</td>
                                <td>89</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>משפטים</td>
                                <td>3</td>
                                <td>94</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>BI</td>
                                <td>3.5</td>
                                <td>76</td>
                            </tr>
                            </tbody>
                        </table>
            
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" dir="rtl" style="text-align: center">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="float: right">יעדים  אישיים </h2>
                        <ul class="nav navbar-right panel_toolbox">ערוך
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
</ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" >
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th style="text-align: center">קורס</th>
                                <th style="text-align: center">נק"ז</th>
                                <th style="text-align: center">ציון מטרה</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>גיודזיה</td>
                                <td>3</td>
                                <td><input type="number" style="width: 20%"></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>משפטים</td>
                                <td>3</td>
                                <td>94</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>BI</td>
                                <td>3.5</td>
                                <td>76</td>
                            </tr>
                            <tr>
                                <b>
                                <th scope="row"><b>4</b></th>
                                <td><b>ממוצע</b></td>
                                <td><b>30</b></td>
                                <td><b>80.3</b></td>
                                </b>
                            </tr>
                            </tbody>
                        </table>
            
                    </div>
                </div>
            </div>
            <br />
            
            <div class="row">
                
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel tile fixed_height_320">
                        <div class="x_title">
                            <h2>App Versions</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
<ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <h4>App Usage across versions</h4>
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span>0.1.5.2</span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w_right w_20">
                                    <span>123k</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span>0.1.5.3</span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w_right w_20">
                                    <span>53k</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span>0.1.5.4</span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w_right w_20">
                                    <span>23k</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span>0.1.5.5</span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w_right w_20">
                                    <span>3k</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget_summary">
                                <div class="w_left w_25">
                                    <span>0.1.5.6</span>
                                </div>
                                <div class="w_center w_55">
                                    <div class="progress">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w_right w_20">
                                    <span>1k</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel tile fixed_height_320 overflow_hidden">
                        <div class="x_title">
                            <h2>Device Usage</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="" style="width:100%">
                                <tr>
                                    <th style="width:37%;">
                                        <p>Top 5</p>
                                    </th>
                                    <th>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <p class="">Device</p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <p class="">Progress</p>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                                    </td>
                                    <td>
                                        <table class="tile_info">
                                            <tr>
                                                <td>
                                                    <p><i class="fa fa-square blue"></i>IOS </p>
                                                </td>
                                                <td>30%</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><i class="fa fa-square green"></i>Android </p>
                                                </td>
                                                <td>10%</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><i class="fa fa-square purple"></i>Blackberry </p>
                                                </td>
                                                <td>20%</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><i class="fa fa-square aero"></i>Symbian </p>
                                                </td>
                                                <td>15%</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><i class="fa fa-square red"></i>Others </p>
                                                </td>
                                                <td>30%</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel tile fixed_height_320">
                        <div class="x_title">
                            <h2>Quick Settings</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="dashboard-widget-content">
                                <ul class="quick-list">
                                    <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                                    </li>
                                    <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                                    </li>
                                    <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                                    <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                                    </li>
                                    <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                                    <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                                    </li>
                                    <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                                    </li>
                                </ul>
                                
                                <div class="sidebar-widget">
                                    <h4>Profile Completion</h4>
                                    <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                                    <div class="goal-wrapper">
                                        <span id="gauge-text" class="gauge-value pull-left">0</span>
                                        <span class="gauge-value pull-left">%</span>
                                        <span id="goal-text" class="goal-value pull-right">100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            
            
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Recent Activities <small>Sessions</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="dashboard-widget-content">
                                
                                <ul class="list-unstyled timeline widget">
                                    <li>
                                        <div class="block">
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                                </h2>
                                                <div class="byline">
                                                    <span>13 hours ago</span> by <a>Jane Smith</a>
                                                </div>
                                                <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                                </h2>
                                                <div class="byline">
                                                    <span>13 hours ago</span> by <a>Jane Smith</a>
                                                </div>
                                                <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                                </h2>
                                                <div class="byline">
                                                    <span>13 hours ago</span> by <a>Jane Smith</a>
                                                </div>
                                                <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                                </h2>
                                                <div class="byline">
                                                    <span>13 hours ago</span> by <a>Jane Smith</a>
                                                </div>
                                                <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-8 col-sm-8 col-xs-12">
                    
                    
                    
                    <div class="row">
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Visitors location <small>geo-presentation</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="dashboard-widget-content">
                                        <div class="col-md-4 hidden-small">
                                            <h2 class="line_30">125.7k Views from 60 countries</h2>
                                            
                                            <table class="countries_list">
                                                <tbody>
                                                <tr>
                                                    <td>United States</td>
                                                    <td class="fs15 fw700 text-right">33%</td>
                                                </tr>
                                                <tr>
                                                    <td>France</td>
                                                    <td class="fs15 fw700 text-right">27%</td>
                                                </tr>
                                                <tr>
                                                    <td>Germany</td>
                                                    <td class="fs15 fw700 text-right">16%</td>
                                                </tr>
                                                <tr>
                                                    <td>Spain</td>
                                                    <td class="fs15 fw700 text-right">11%</td>
                                                </tr>
                                                <tr>
                                                    <td>Britain</td>
                                                    <td class="fs15 fw700 text-right">10%</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="row">
                        
                        
                        <!-- Start to do list -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>To Do List <small>Sample tasks</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    
                                    <div class="">
                                        <ul class="to_do">
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Create email address for new intern</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Create email address for new intern</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End to do list -->
                        
                        <!-- start of weather widget -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Daily active users <small>Sessions</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="temperature"><b>Monday</b>, 07:30 AM
<span>F</span>
                                                <span><b>C</b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="weather-icon">
                                                <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="weather-text">
                                                <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="weather-text pull-right">
                                            <h3 class="degrees">23</h3>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    
                                    <div class="row weather-days">
                                        <div class="col-sm-2">
                                            <div class="daily-weather">
                                                <h2 class="day">Mon</h2>
                                                <h3 class="degrees">25</h3>
                                                <canvas id="clear-day" width="32" height="32"></canvas>
                                                <h5>15 <i>km/h</i></h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="daily-weather">
                                                <h2 class="day">Tue</h2>
                                                <h3 class="degrees">25</h3>
                                                <canvas height="32" width="32" id="rain"></canvas>
                                                <h5>12 <i>km/h</i></h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="daily-weather">
                                                <h2 class="day">Wed</h2>
                                                <h3 class="degrees">27</h3>
                                                <canvas height="32" width="32" id="snow"></canvas>
                                                <h5>14 <i>km/h</i></h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="daily-weather">
                                                <h2 class="day">Thu</h2>
                                                <h3 class="degrees">28</h3>
                                                <canvas height="32" width="32" id="sleet"></canvas>
                                                <h5>15 <i>km/h</i></h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="daily-weather">
                                                <h2 class="day">Fri</h2>
                                                <h3 class="degrees">28</h3>
                                                <canvas height="32" width="32" id="wind"></canvas>
                                                <h5>11 <i>km/h</i></h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="daily-weather">
                                                <h2 class="day">Sat</h2>
                                                <h3 class="degrees">26</h3>
                                                <canvas height="32" width="32" id="cloudy"></canvas>
                                                <h5>10 <i>km/h</i></h5>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <!-- end of weather widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

    </div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

</body>
</html>

