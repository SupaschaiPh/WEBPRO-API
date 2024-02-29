<?php
include "../../middleware.php";
include "./init.php";
include "../../lib/user.php";

if ((!isset($_SESSION["access_token"])) && isset($_GET['code'])) {
    if ((isset($_GET["state"]) && strcmp($_GET["state"], "checkedbysp") == 0)) {
        $client->authenticate($_GET['code']);
        $access_token = $client->getAccessToken();
        if ($access_token)
            $_SESSION["access_token"] = $access_token;
        $outh2 = new Google\Service\Oauth2($client);
        $uinfo = $outh2->userinfo->get();
        //echo json_encode($outh2->userinfo->get());
        createUser($uinfo->email, null, $uinfo->givenName, $uinfo->familyName, null);
        
        $user = loginByOauth($uinfo->email);
        if($user){
            $_SESSION["uinfo"] = $user;
            unset($_SESSION["uinfo"]["password"]);
        }

        header('Location: /');
    } else {
        header('Location: ./error.php');
    }
} else {
    //$client->setAccessToken($_SESSION["access_token"]);    
    header('Location: /');
}
