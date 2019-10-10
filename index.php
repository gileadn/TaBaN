<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="1037943097707-1t6rmlkln94ubi27bkcolae7pdud0pvn.apps.googleusercontent.com">
    
    <title>Login</title>
    
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
    
    <link href="vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login" dir="rtl" style="background-image: url('production/images/backgroundLogin.jpg');background-repeat: no-repeat;background-size: cover;">
<button id="signout-button" onclick="handleSignOutClick()">Sign out</button>
<div>
    <div>
        <div>
                    <video autoplay muted loop style="position: fixed;right: 0;bottom: 0;min-width: 100%;min-height: 100%;z-index: -1">
                        <source src="production/video/TimlapseClouds1Videvo.mov" type="video/mp4">
                    </video>
                    <h1>
                        <div style="color: #000000;font-size: 300%;font-family: cursive;margin-top: 3%;text-align: center;">HASKALA</div>
                    </h1>
                    <div style="text-align: center">
                        <form action="loginPHP.php" method="post">
                            <input type="submit" name="submit" id="signin-button" class="btn btn-default submit"  style="border-radius: 100%;padding: 10%;background-image: url('production/images/GoogleLogoLogin.jpg');background-repeat: no-repeat;background-size: cover;">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                        <br />
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vendors/nprogress/nprogress.js"></script>
<!-- FullCalendar -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>
</body>
</html>
