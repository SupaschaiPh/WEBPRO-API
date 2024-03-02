<?php

include __DIR__ . "/../lib/util.php";

function createUser($email, $password, $name, $lastname, $tel)
{
    include __DIR__ . "/../connect.php";
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
    $sql = "SELECT id , email FROM `user` WHERE `email`='" . mysqli_real_escape_string($conn, $email) . "'";
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC)[0];
    mysqli_close($conn);
    return $res;
}

function editUser($uid, $name = null, $lastname = null, $tel = null, $role = null, $active = 1)
{
    #check username
    if (!($active == 0 || $active == 1)) {
        return $active = 1;
    }
    include __DIR__ . "/../connect.php";

    try {
        $setsql = "";
        $setsql = setSQLSet($conn, $setsql, "name", $name);
        $setsql = setSQLSet($conn, $setsql, "lastname", $lastname);
        $setsql = setSQLSet($conn, $setsql, "tel", $tel);
        $setsql = setSQLSet($conn, $setsql, "role", $role);
        $setsql = setSQLSet($conn, $setsql, "active", $active);
        $sql = "
    UPDATE
    `user`
    SET
        " . $setsql . "
    WHERE
        `user`.`id` = '" .  mysqli_real_escape_string($conn, $uid)  . "'
    ";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        echo $th;
        return false;
    }
}

function changePassword($uid, $oldPassword = null, $newPassword = "")
{
    include __DIR__ . "/../connect.php";
    try {
        $sql = "SELECT id FROM `user` WHERE `id`='" . mysqli_real_escape_string($conn, $uid) . "' AND `user`.`password`='" . mysqli_real_escape_string($conn, $oldPassword);
        $check = mysqli_fetch_all(mysqli_query($conn, $sql));
        if (count($check) > 0) {
            mysqli_close($conn);
            return false;
        }
        $sql = "
    UPDATE
    `user`
    SET
        `password` = '" . mysqli_real_escape_string($conn, $newPassword) . "'
    WHERE
        `user`.`id` = '" . (isset($tel) ? ("'" . mysqli_real_escape_string($conn, $uid) . "'") : "NULL") . "'
    ";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}

function getUsers($limit = null, $offset = 0, $filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }

    if ($limit != null) {
        $sql = "SELECT * FROM user JOIN user_role USING (role) " . filterObjToSQL($conn, $filters) . " LIMIT " . intval($limit) . " OFFSET " . intval($offset);
    } else {
        $sql = "SELECT * FROM user JOIN user_role USING (role) " . filterObjToSQL($conn, $filters) . " ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(id) FROM user " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0];
    mysqli_close($conn);
    return $hold;
}


function login($email, $password)
{
    include __DIR__ . "/../connect.php";
    if (!$password) return null;
    $sql = "SELECT * FROM user WHERE email='" . mysqli_real_escape_string($conn, $email) . "' AND password='" . mysqli_real_escape_string($conn, $password) . "'";
    $res = mysqli_fetch_array(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}

function loginByOauth($email)
{
    include __DIR__ . "/../connect.php";
    $sql = "SELECT * FROM user WHERE email='" . mysqli_real_escape_string($conn, $email) . "' ;";
    $res = mysqli_fetch_array(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}
