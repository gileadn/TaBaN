<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
    require '../conn.php';
    require '../../GoogleClient.php';
    require '../../calendar/quickstart/vendor/autoload.php';
    $conn = OpenCon();
    $email = $_POST['email'];
    $class = $_POST['class'];
    $sql = "UPDATE studentcourse SET grade=0 WHERE email='$email' and coursename='$class'";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../AftKataLogin.php");
    }
    else {
        echo "Error updating record: " . $conn->error;
    }
