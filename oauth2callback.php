<?php
    require __DIR__ . '/calendar/quickstart/vendor/autoload.php';
    require 'GoogleClient.php';
    $client = getGoogleClient();
    session_start();
    
    if (!isset($_GET['code'])) {
        $auth_url = $client->createAuthUrl();
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    } else {
        $client->authenticate($_GET['code']);
        $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        $client->setAccessToken($_SESSION['access_token']);
        header("Location: loginPHP.php");
    }
