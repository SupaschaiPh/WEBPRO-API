<?php
function getRoles(){
    include __DIR__."/../connect.php";
    if (mysqli_connect_error()) {
        return json_encode(array("error"=>"mysql gone away"));
    }
    $sql = "SELECT * FROM user_role";
    $res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}
