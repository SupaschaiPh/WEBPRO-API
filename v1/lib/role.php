<?php
include_once __DIR__ . "/../lib/util.php";

function getRoles()
{
    include __DIR__ . "/../connect.php";
    $sql = "SELECT * FROM user_role";
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}
function addRole($roleName, $roleDesc = null)
{
    include __DIR__ . "/../connect.php";
    try {
        $sql = "INSERT INTO `user_role` (`role`, `role_desc`) 
    VALUES ('" . mysqli_real_escape_string($conn, $roleName) . "', '" . mysqli_real_escape_string($conn, $roleDesc) . "')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}

function editRole($roleName, $roleDesc = null, $newRollName = null)
{
    include __DIR__ . "/../connect.php";
    $setsql = "";
    $setsql = setSQLSet($conn, $setsql, "role", $newRollName);
    $setsql = setSQLSet($conn, $setsql, "role_desc", $roleDesc);
    try {
        $sql = "
        UPDATE 
            `user_role`
        SET
            " . $setsql . "
        WHERE
            `user_role`.role = '" . mysqli_real_escape_string($conn, $roleName) . "'
        ";
        mysqli_query($conn, $sql);
        return checkItEdited($conn);
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}

function removeRole($roleName)
{
    include __DIR__ . "/../connect.php";
    try {
        $sql = "
        DELETE FROM 
            `user_role`
        WHERE
            `user_role`.role = '" . mysqli_real_escape_string($conn, $roleName) . "'
        ";
        mysqli_query($conn, $sql);
        return checkItEdited($conn);
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}
