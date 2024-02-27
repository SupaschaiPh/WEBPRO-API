<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";


checkRequirekeyQuery($_POST,array("email","password"));
try {
    $conn = mysqli_connect(CONFIG["HOST"], CONFIG["DB_USERNAME"], CONFIG["DB_PASSWORD"],CONFIG["DB_MAIN_NAME"]);
    if (mysqli_connect_error()) {
        echo json_encode(array("error"=>"mysql gone away"));
    }
    $sql = "SELECT * FROM user WHERE email='".mysqli_real_escape_string($conn,$_POST["email"])."' AND password=''".mysqli_real_escape_string($conn,$_POST["password"]);
    $user = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
    $_SESSION["uinfo"] = $user;
    $_SESSION["uinfo"]["password"] = "hidden";
    //time()+60*60*24*30 will set the cookie to expire in 30 days.
    setcookie("check",password_hash($user["id"],PASSWORD_DEFAULT),time()+60*60*24);
    mysqli_close($conn);
} catch (Throwable $th) {
    http_response_code(503);
}

    

