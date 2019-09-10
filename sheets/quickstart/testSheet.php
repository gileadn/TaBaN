<?php
    
    require __DIR__ . '/vendor/autoload.php';
    
    function getClient()
    {
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets and PHP ');
    $client->setScopes((array)'https://www.googleapis.com/auth/spreadsheets');
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');
    $tokenPath = 'token.json';
    
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }
    
    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));
            
            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);
            
            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}
    $client = getClient();
    $service = new Google_Service_Sheets($client);
    $spreadsheetId = '1HPrZHP2DLEgC6PHRsQmekdToRgjq8foCbuGoCs4s2k0';
    $range = 'testing!A1:B';
    $postBody = new Google_Service_Sheets_ValueRange();
    // You need to specify the values you insert
    $postBody->setValues(array("values" => ["saar", "fucking", "leiba"]));// Add two values
    // Then you need to add some configuration
    $conf =   array("valueInputOption" => "RAW");
    // Update the spreadsheet
    $service->spreadsheets_values-> append($spreadsheetId, $range,$postBody, $conf);
 
