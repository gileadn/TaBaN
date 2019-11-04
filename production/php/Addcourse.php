<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
    require '../conn.php';
    require '../../GoogleClient.php';
    require '../../calendar/quickstart/vendor/autoload.php';
    $conn = OpenCon();
    $semester = $_POST['semester'];
    $course = $_POST['course'];
    $class = $_POST['class'];
    $hours = $_POST['hours'];
    $points = $_POST['points'];
    $sql = " INSERT INTO course  (coursename,semster,points,hours,classes)
        VALUES ('$course', '$semester' ,$points  ,$hours , $class)";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../KataDB.php");
    }
    else {
        echo "Error updating record: " . $conn->error;
    }