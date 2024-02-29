<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";
include "../lib/user.php";



try {
    checkRequirekeyQuery($_POST, array("email", "password"));
    $user = login($_POST["email"], $_POST["password"]);
    if ($user) {
        $_SESSION["uinfo"] = $user;
        unset($_SESSION["uinfo"]["password"]);
        echo json_encode(
            array(
                "status"=>"success"
            )
        );
    } else {
        $_SESSION["uinfo"] = array();
        echo json_encode(
            array(
                "status"=>"fail",
                "message"=>"username or password not match"
            )
        );
    }
    //time()+60*60*24*30 will set the cookie to expire in 30 days.
    //setcookie("check",password_hash($user["id"],PASSWORD_DEFAULT),time()+60*60*24);
    //header('Location: /');
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "true") == 0) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
