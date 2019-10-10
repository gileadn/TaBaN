<?php
    require __DIR__ . '/calendar/quickstart/vendor/autoload.php';
function getGoogleClient(){
    $client = new Google_Client();
    $client->setAuthConfig('credentials.json');
    //$client->addScope('https://www.googleapis.com/auth/calendar', 'https://www.googleapis.com/auth/userinfo.email');
    $client->setScopes(array('https://www.googleapis.com/auth/calendar',  'https://www.googleapis.com/auth/userinfo.email'));
    $client->setRedirectUri('http://localhost/Taban/oauth2callback.php');
    $client->setAccessType('online');        // offline access
    $client->setIncludeGrantedScopes(true);   // incremental auth
    return $client;
}
