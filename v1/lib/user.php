<?php
function createUser($email, $password, $name, $lastname, $tel)
{
    include __DIR__."/../connect.php";
    if (mysqli_connect_error()) {
        echo json_encode(array("error" => "mysql gone away"));
    }
    #check username
    $sql = "SELECT id FROM `user` WHERE `email`='" . mysqli_real_escape_string($conn, $email) . "'";
    $check = mysqli_fetch_all(mysqli_query($conn, $sql));
    if (count($check) > 0) {
        mysqli_close($conn);
        return null;
    }
    $sql = "
INSERT INTO `user` (`id`, `email`, `password`, `role`, `name`, `lastname`, `tel`, `active`) 
VALUES (
    uuid(), 
    '" . mysqli_real_escape_string($conn, $email) . "',    
     " . (isset($password) ? ("'" . mysqli_real_escape_string($conn, $password) . "'") : "NULL") . ",
    'customer',
    '" . mysqli_real_escape_string($conn, $name) . "', 
    '" . mysqli_real_escape_string($conn, $lastname) . "',
    " . (isset($tel) ? ("'" . mysqli_real_escape_string($conn, $tel) . "'") : "NULL") . ",
    '1');
";
    mysqli_query($conn, $sql);
    $sql = "SELECT id FROM `user` WHERE `email`='" . mysqli_real_escape_string($conn, $email) . "'";
    $res = mysqli_fetch_all(mysqli_query($conn, $sql))[0][0];
    mysqli_close($conn);
    return $res;
}

function getUsers($limit = null,$offset = 0){
    include __DIR__."/../connect.php";
    if($offset<0){$offset=0;}
    if (mysqli_connect_error()) {
        return json_encode(array("error"=>"mysql gone away"));
    }
    if($limit){
        $sql = "SELECT * FROM user JOIN user_role USING (role) LIMIT ".intval($limit)." OFFSET ".intval($offset).";";
    }else{
        $sql = "SELECT * FROM user JOIN user_role USING (role);";
    }
    $res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}
