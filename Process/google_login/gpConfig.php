<?php

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '221658420649-ce3k1potta13tlc2blt79mf8ondfoa6f.apps.googleusercontent.com'; //Google client ID
$clientSecret = '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'; //Google client secret
$redirectURL = 'http://localhost:8080/BeU_Website/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>