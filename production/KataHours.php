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
    
    <title>AftKata</title>
    
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col" style="display: block">
            <div class="left_col scroll-view">
                <a href="AftKataLogin.php" class="site_title" style="padding-bottom: 70px;"><img src="images/logo2.png" height="50" width="50"/><span>HASKALA</span></a>
                
                <div class="clearfix"></div>
                
                <br />
                
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section" dir="rtl">
                        <h3 style="    margin: -35px 25px 0px 0px; font-size: xx-large;">אישי</h3>
                        <ul class="nav side-menu" style="padding-right: 0px;">
                            <li ><a href="AftKataLogin.php"><i class="fa fa-graduation-cap" ></i> ציונים</a></li>
                            <li><a href="KataConst.php"><i class="fa fa-desktop"></i> אילוצים</a></li>
                            <li><a href="KataJust.php"><i class="fa fa-bar-chart-o"></i> צדק</a></li>
                        </ul>
                    </div>
                </div>
                <div class="menu_section" dir="rtl">
                    <h3 style=" margin: -35px 25px 0px 0px; font-size: xx-large;">ניהול</h3>
                    <ul class="nav side-menu" style="padding-right: 0px;">
                        <li><a href="KataToran.php"><i class="fa fa-puzzle-piece"></i> תורנויות</a></li>
                        <li class="active"><a href="KataHours.php"><i class="fa fa-eye"></i> מעקב שעות </a></li>
                        <li><a href="KataHisor.php"><i class="fa fa-users"></i> חיסורים</a></li>
                        <li><a href="KataOtherGrades.php"><i class="fa fa-graduation-cap"></i> ציוני צוערים </a></li>
                        <li><a href="KataCancles.php"><i class="fa fa-fire"></i> ביטולים מיוחדים </a></li>
                        <li><a href="KataDB.php"><i class="fa fa-database"></i> בסיס נתונים </a></li>
                    </ul>
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
                            <a href="javascript:;" id="user-id" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <?php echo $email;?><span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right" dir="rtl">
                                <li><a href="ChangePosition.php" dir="rtl">שנה סוג משתמש</a></li>
                                <li><a href="../index.php"><i class="fa fa-sign-out pull-right"></i> יציאה</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        
        <!-- page content -->
        <div class="right_col" role="main" dir="rtl">
            <div class="row" style="text-align: center">
                <div class="col-md-8 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>לו"ז גוגל </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="x_panel">
                        <div style="text-align: center" class="x_title">
                            <h2 style="text-align: right">שעות שבועיות</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                        </div>
                        <div class="x_content">
                            <form action="check.php" method="post" accept-charset="utf-8">
                                <label for="semester">סמסטר</label>
                                <input type="button" style="width: 30px;" name="semester" value="ד">
                                <input type="button" style="width: 30px;"name="semester" value="ה">
                                <input type="button" style="width: 30px;" name="semester" value="ו">
                                <label for="week">שבוע</label>
                                <input type="number" name="number" style="width: 40px;"  id="number" required >
                                <br>
                                <input type="submit"   style="text-align: center" class="btn btn btn-success" value="הצג">
                            </form>
                        </div>
                            <div class="x_content" >
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="text-align: center">קורס</th>
                                        <th style="text-align: center">שעות מתוכננות</th>
                                        <th style="text-align: center">שעות שבוצעו</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>גיודזיה</td>
                                        <td>3</td>
                                        <td>33</td>
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
                <div class="row" style="text-align: center">
                    <div class="col-md-3 col-sm-12 col-xs-12" dir="rtl" style="text-align: center"></div>
                    <div class="col-md-6 col-sm-6 col-xs-6" dir="rtl" style="text-align: center">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 style="float: bottom;">שעות סה"כ </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content" >
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="text-align: center">קורס</th>
                                        <th style="text-align: center">שעות בסילבוס</th>
                                        <th style="text-align: center">שעות שתוכננו</th>
                                        <th style="text-align: center">שעות שבוצעו</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>גיודזיה</td>
                                        <td>3</td>
                                        <td>76</td>
                                        <td><input type="number" style="width: 20%"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>משפטים</td>
                                        <td>3</td>
                                        <td>76</td>
                                        <td>94</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>BI</td>
                                        <td>3.5</td>
                                        <td>76</td>
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
                    <div class="col-md-3 col-sm-12 col-xs-12" dir="rtl" style="text-align: center"></div>
                </div>
            </div>
            <br />
            <!-- /page content -->
        </div>
        <footer>
            <div class="pull-right" dir="rtl">
              השכלה היא מערכת לניהול חיי צוערים.  <br>
                פותחה ע"י שחר בורג, תם בן שפר (תב"ש) וגלעד נבו - קורס 180.
            </div>
            <div class="clearfix"></div>
        </footer>
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
<!-- FullCalendar -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- jquery.inputmask -->
<script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- jQuery Knob -->
<script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
  $('#myDatepicker').datetimepicker();

  $('#myDatepicker2').datetimepicker({
    format: 'DD.MM.YYYY'
  });

  $('#myDatepicker3').datetimepicker({
    format: 'hh:mm A'
  });

  $('#myDatepicker4').datetimepicker({
    ignoreReadonly: true,
    allowInputToggle: true
  });

  $('#datetimepicker6').datetimepicker();

  $('#datetimepicker7').datetimepicker({
    useCurrent: false
  });

  $("#datetimepicker6").on("dp.change", function(e) {
    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
  });

  $("#datetimepicker7").on("dp.change", function(e) {
    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
  });
</script>
</body>
</html>
