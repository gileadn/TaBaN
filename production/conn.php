<?php
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "123456";
        //$dbpass ="";
        $db = "haskala";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        $conn->query("SET NAMES 'utf8'");
        return $conn;
    }
    
    function CloseCon($conn)
    {
        $conn -> close();
    }
?>

