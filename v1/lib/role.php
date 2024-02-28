<?php
function getRoles(){
    include __DIR__."/../connect.php";
    $sql = "SELECT * FROM user_role";
    $res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}
function addRole($roleName,$roleDesc = null){
    include __DIR__."/../connect.php";
    $sql = "INSERT INTO `user_role` (`role`, `role_desc`) 
    VALUES ('".mysqli_real_escape_string($conn,$roleName)."', '".mysqli_real_escape_string($conn,$roleDesc)."')";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    return true;

}
