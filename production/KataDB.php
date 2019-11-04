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
                <a href="AftKataLogin.php" class="site_title" style="padding-bottom: 70px;"><img src="images/logo2.png" height="50" width="50"/><span>HASKALA</span></a>
                
                <div class="clearfix"></div>
                
                <br />
                
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section" dir="rtl">
                        <h3 style="    margin: -35px 25px 0px 0px; font-size: xx-large;">אישי</h3>
                        <ul class="nav side-menu" style="padding-right: 0px;">
                            <li><a href="AftKataLogin.php"><i class="fa fa-graduation-cap" ></i> ציונים</a></li>
                            <li><a href="KataConst.php"><i class="fa fa-desktop"></i> אילוצים</a></li>
                            <li><a href="KataJust.php"><i class="fa fa-bar-chart-o"></i> צדק</a></li>
                        </ul>
                    </div>
                </div>
                <div class="menu_section" dir="rtl">
                    <h3 style=" margin: -35px 25px 0px 0px; font-size: xx-large;">ניהול</h3>
                    <ul class="nav side-menu" style="padding-right: 0px;">
                        <li><a href="KataToran.php"><i class="fa fa-puzzle-piece"></i> תורנויות</a></li>
                        <li><a href="KataHours.php"><i class="fa fa-eye"></i> מעקב שעות </a></li>
                        <li><a href="KataHisor.php"><i class="fa fa-users"></i> חיסורים</a></li>
                        <li><a href="KataOtherGrades.php"><i class="fa fa-graduation-cap"></i> ציוני צוערים </a></li>
                        <li><a href="KataCancles.php"><i class="fa fa-fire"></i> ביטולים מיוחדים </a></li>
                        <li  class="active"><a href="KataDB.php"><i class="fa fa-database"></i> בסיס נתונים </a></li>
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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" dir="rtl" style="text-align: center">
                    <a onclick="openAddForm()" class="btn btn-app" style="background-color: lightgreen;">
                        <i class="fa fa-plus"></i> הוסף
                    </a>
                    <a onclick="openRemoveForm()" class="btn btn-app" style="background-color: lightsalmon;">
                        <i class="fa fa-minus"></i> הסר
                    </a>
                    <a onclick="openEditForm()" class="btn btn-app" style="background-color: lightskyblue;">
                        <i class="fa fa-edit"></i> ערוך
                    </a>
                </div>
            </div>
            <div class="row" style="display: none" id="AddForm">
                <div class="col-md-12 col-sm-12 col-xs-12" dir="rtl" style="text-align: center">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 style="float: right">הוסף קורס</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="php/AddCourse.php" method="post" accept-charset="utf-8">
                                <label for="semester">סמסטר</label>
                                <input type="radio" name="semester" value="ד">   ד'
                                <input type="radio" name="semester" value="ה">ה'
                                <input type="radio" name="semester" value="ו">  ו'
                                <label for="course">קורס</label>
                                <select name="course" style="height: 25px" id="course" required>
                                    <option></option>
                                    <option value="אבגד">PHP שמות קורסים</option>
                                </select>
                                <label for="class">שיעורים</label>
                                <input name="class" id="class" type="number" style="width: 5%" required>
                                <label for="hours">שעות</label>
                                <input type="number" name="hours" id="hours" style="width: 5%" required>
                                <label for="points">נק"ז</label>
                                <input type="number" name="points" id="points" style="width: 5%" required>
                                <input name="email" style="display: none" value="<?php echo $email ?>">
                                <input type="submit"  class="btn btn btn-success" value="הוסף">
                                <button type="button" onclick="closeAddForm()" class="btn btn btn-danger">סגור</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: none" id="RemoveForm">
                <div class="col-md-12 col-sm-12 col-xs-12" dir="rtl" style="text-align: center">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 style="float: right">הסר קורס</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="check.php" method="post" accept-charset="utf-8">
                                <label for="semester">סמסטר</label>
                                <input type="radio" name="semester" value="ד">   ד'
                                <input type="radio" name="semester" value="ה">ה'
                                <input type="radio" name="semester" value="ו">  ו'
                                <label for="course">קורס</label>
                                <select name="course" style="height: 25px" id="course" required>
                                    <option></option>
                                    <option value="אבגד">PHP שמות קורסים</option>
                                </select>
                                <input name="email" style="display: none" value="<?php echo $email ?>">
                                <input type="submit"  class="btn btn btn-success" value="הסר">
                                <button type="button" onclick="closeRemoveForm()" class="btn btn btn-danger">סגור</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: none" id="EditForm">
                <div class="col-md-12 col-sm-12 col-xs-12" dir="rtl" style="text-align: center">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 style="float: right">ערוך קורס</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="check.php" method="post" accept-charset="utf-8">
                                <label for="semester">סמסטר</label>
                                <input type="radio" name="semester" value="ד">   ד'
                                <input type="radio" name="semester" value="ה">ה'
                                <input type="radio" name="semester" value="ו">  ו'
                                <label for="course">קורס</label>
                                <select name="course" style="height: 25px" id="course" required>
                                    <option></option>
                                    <option value="אבגד">PHP שמות קורסים</option>
                                </select>
                                <label for="class">שיעורים</label>
                                <input name="class" id="class" type="number" style="width: 5%" required>
                                <label for="hours">שעות</label>
                                <input type="number" name="hours" id="hours" style="width: 5%" required>
                                <label for="points">נק"ז</label>
                                <input type="number" name="points" id="points" style="width: 5%" required>
                                <input name="email" style="display: none" value="<?php echo $email ?>">
                                <input type="submit"  class="btn btn btn-success" style="width: 54px" value="ערוך">
                                <button type="button" onclick="closeEditForm()" class="btn btn btn-danger">סגור</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" dir="rtl" style="text-align: center">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 style="float: right">סמסטר ד'</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center">קורס</th>
                                    <th style="text-align: center">שיעורים</th>
                                    <th style="text-align: center">שעות</th>
                                    <th style="text-align: center">נק"ז</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>גיודזיה</td>
                                    <td>3</td>
                                    <td>89</td>
                                    <td>94</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>משפטים</td>
                                    <td>3</td>
                                    <td>94</td>
                                    <td>94</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>BI</td>
                                    <td>3.5</td>
                                    <td>76</td>
                                    <td>94</td>
                                </tr>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" dir="rtl" style="text-align: center">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 style="float: right">סמסטר ה'</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center">קורס</th>
                                    <th style="text-align: center">שיעורים</th>
                                    <th style="text-align: center">שעות</th>
                                    <th style="text-align: center">נק"ז</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>גיודזיה</td>
                                    <td>3</td>
                                    <td>9</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>משפטים</td>
                                    <td>3</td>
                                    <td>94</td>
                                    <td>94</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>BI</td>
                                    <td>3.5</td>
                                    <td>76</td>
                                    <td>94</td>
                                </tr>
                                <tr>
                                    <b>
                                        <th scope="row"><b>4</b></th>
                                        <td><b>ממוצע</b></td>
                                        <td><b>30</b></td>
                                        <td><b>80.3</b></td>
                                        <td>94</td>
                                    </b>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" dir="rtl" style="text-align: center">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 style="float: right">סמסטר ו'</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center">קורס</th>
                                    <th style="text-align: center">שיעורים</th>
                                    <th style="text-align: center">שעות</th>
                                    <th style="text-align: center">נק"ז</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>גיודזיה</td>
                                    <td>3</td>
                                    <td>9</td>
                                    <td>94</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>משפטים</td>
                                    <td>3</td>
                                    <td>94</td>
                                    <td>94</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>BI</td>
                                    <td>3.5</td>
                                    <td>76</td>
                                    <td>94</td>
                                </tr>
                                <tr>
                                    <b>
                                        <th scope="row"><b>4</b></th>
                                        <td><b>ממוצע</b></td>
                                        <td><b>30</b></td>
                                        <td><b>80.3</b></td>
                                        <td>94</td>
                                    </b>
                                </tr>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                </div>
            </div>
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
<script>
  function openAddForm() {
    document.getElementById("AddForm").style.display = "block";
    document.getElementById("RemoveForm").style.display = "none";
    document.getElementById("EditForm").style.display = "none";
  }
  function openRemoveForm() {
    document.getElementById("RemoveForm").style.display = "block";
    document.getElementById("AddForm").style.display = "none";
    document.getElementById("EditForm").style.display = "none";
  }
  function openEditForm() {
    document.getElementById("EditForm").style.display = "block";
    document.getElementById("AddForm").style.display = "none";
    document.getElementById("RemoveForm").style.display = "none";
  }
  function closeAddForm() {
    document.getElementById("AddForm").style.display = "none";
  }
  function closeRemoveForm() {

    document.getElementById("RemoveForm").style.display = "none";
  }
  function closeEditForm() {
    document.getElementById("EditForm").style.display = "none";
  }
</script>
</body>
</html>
