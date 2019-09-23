<?php
    $servername = 'localhost';
    $username = 'id10843269_haskala';
    $password = '123456';
    $database = 'id10843269_haskala_db';
    $mysqli = new mysqli($servername, $username, $password, $database);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    echo "Connected successfully";
