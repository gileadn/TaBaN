<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
    echo $_POST['date'];
    echo $_POST['day'];
    echo $_POST['name'];
    echo $_POST['toran'];
    echo $_POST['ClassHours'];
    echo $_POST['FreeHours'];
?>
</head>
</html>

