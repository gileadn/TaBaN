<?php
    require __DIR__ . '/calendar/quickstart/vendor/autoload.php';
    require 'GoogleClient.php';
    require 'production/conn.php';
            $client = getGoogleClient();
            session_start();
            if (isset($_SESSION['access_token']) && $_SESSION['access_token']){
                $client->setAccessToken($_SESSION['access_token']);
                if($client->isAccessTokenExpired())
                {
                    $auth_url = $client->createAuthUrl();
                    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
                }
                $conn = OpenCon();
                $me= new Google_Service_Plus($client);
                $email = $me->people->get('me')->getEmails();
                $email = $email[0]['value'];
                $mysql_qry = "SELECT email, position  FROM students where email= '$email'";
                $num = mysqli_query($conn, $mysql_qry);
                $row = mysqli_fetch_assoc($num);
                if( isset($row["email"]) && $row["email"]){
                    if($row["position"]=='reg'){
                        header("Location:production/AftRegLogin.php");
                    }
                    else{
                        header("Location:production/AftKataLogin.php");
                    }
                }
                else{
                    header("Location: production/Register.php");
                }
            } else {
                $auth_url = $client->createAuthUrl();
                header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
            }
        
