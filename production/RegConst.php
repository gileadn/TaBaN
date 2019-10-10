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
                            <li class="active"><a href="AftKataLogin.php"><i class="fa fa-graduation-cap" ></i> ציונים</a></li>
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
            <!--calendar-->
            <div class="row">
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
                    <div class="x_panel" style="">
                        <div class="x_title">
                            <h2>הוספת אילוצים </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            
                            <div class="container">
                                <div class="row">
                                    <div class="clearfix"></div>
                                    <h3>זמן התחלה</h3>
                                    <div>
                                        תאריך
                                        <div class="form-group" dir="ltr">
                                            <div class="input-group date" id="myDatepicker2">
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                        שעה
                                        <div class="form-group" dir="ltr">
                                            <div class="input-group date" id="myDatepicker3" >
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h3>זמן סיום</h3>
                                    <div>
                                        תאריך
                                        <div class="form-group" dir="ltr">
                                            <div class="input-group date" id="myDatepicker2">
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                        שעה
                                        <div class="form-group" dir="ltr">
                                            <div class="input-group date" id="myDatepicker3">
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div style="display: inline-block;">
                                        <h2>כמות משתתפים</h2>
                                        <div style="display: inline-block; width: 100px">ניהול מערכות מידע</div>
                                        <input type="number" value="0" min="0" style="width: 15%" >
                                        <div class="clearfix"></div>
                                        <div style="display: inline-block; width: 100px">פוליטיקה וממשל</div>
                                        <input type="number" value="0" min="0" style="width: 15%" >
                                        <div class="clearfix"></div>
                                        <div style="display: inline-block; width: 100px">מתמטיקה</div>
                                        <input type="number" value="0" min="0" style="width: 15%" >
                                        <div class="clearfix"></div>
                                        <div style="display: inline-block; width: 100px">כלכלה</div>
                                        <input type="number" value="0" min="0" style="width: 15%" >
                                        <div class="clearfix"></div>
                                    </div>
                                    <div style="display: inline-block">
                                        <h2>תיאור האילוץ</h2>
                                        <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/calendar-->
            <!-- /page content -->
        </div>
        <footer>
            <div class="pull-right">
                השכלה - מערכת לניהול חיי צוערים. תוכנתה ע"י תם בן שפר, שחר בורג וגלעד נבו קורס 180
            </div>
            <div class="clearfix"></div>
        </footer>
    </div>
</div>
<!-- calendar modal -->
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel" dir="rtl">הוספת אילוץ</h4>
            </div>
            <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                    <form id="antoform" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
            </div>
            <div class="modal-body">
                
                <div id="testmodal2" style="padding: 5px 20px;">
                    <form id="antoform2" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title2" name="title2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

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
