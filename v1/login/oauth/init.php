<?php
require "../../../vendor/autoload.php";

$client = new Google\Client();
// Required, call the setAuthConfig function to load authorization credentials from
// client_secret.json file.
$client->setAuthConfig('client_secret_1_518362340307-gj38rn5lah63b17gq28qnnet7q40csu7.apps.googleusercontent.com.json');

// Required, to set the scope value, call the addScope function
$client->addScope(Google\Service\Oauth2::USERINFO_EMAIL);
$client->addScope(Google\Service\Oauth2::USERINFO_PROFILE);
$client->addScope(Google\Service\Oauth2::OPENID);



// Required, call the setRedirectUri function to specify a valid redirect URI for the
// provided client_id
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/v1/login/oauth/callback.php');

// Recommended, offline access will give you both an access and refresh token so that
// your app can refresh the access token without user interaction.
$client->setAccessType('offline');

// Recommended, call the setState function. Using a state value can increase your assurance that
// an incoming connection is the result of an authentication request.
$client->setState("check=enabled");

// Optional, if your application knows which user is trying to authenticate, it can use this
// parameter to provide a hint to the Google Authentication Server.
$client->setLoginHint('@kmitl.ac.th');

// Optional, call the setPrompt function to set "consent" will prompt the user for consent
$client->setPrompt('consent');

// Optional, call the setIncludeGrantedScopes function with true to enable incremental
// authorization
$client->setIncludeGrantedScopes(true);
