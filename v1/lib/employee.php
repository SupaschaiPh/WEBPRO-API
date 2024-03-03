<?php
include_once __DIR__ . "/../lib/util.php";

function regisEmployee($id, $name, $lastname, $address, $duty)
{
    include __DIR__ . "/../connect.php";
    try {
        $sql = "INSERT INTO `employee`(
            `id`,
            `name`,
            `lastname`,
            `duty`,
            `address`,
            `start_date`
        )
        VALUES(
            '" . mysqli_real_escape_string($conn, $id) . "',
            " . setOrNull($conn, $name) . ",
            " . setOrNull($conn, $lastname) . ",
            " . setOrNull($conn, $duty) . ",
            " . setOrNull($conn, $address) . ",
            " . getSQLdatetimeFormat() . "
        )";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}

function editEmployee($id, $name, $lastname, $address, $duty,$salary,$start_date,$profile_url)
{
    if(!(isset($salary)&&(is_int($salary) || is_float($salary))))return false;
    include __DIR__ . "/../connect.php";
    try {
        $sql = "UPDATE
                    `employee`
                SET
                    `e_name` = '".setOrNull($conn,$name)."',
                    `e_lastname` = '".setOrNull($conn,$lastname)."',
                    `duty` = '".setOrNull($conn,$duty)."',
                    `address` = '".setOrNull($conn,$address)."',
                    `salary` = '".setOrNull($conn,$salary)."',
                    `start_date` = '".setOrNull($conn,$start_date)."',
                    `profile_url` = '".setOrNull($conn,$profile_url)."'
                WHERE
                    `employee`.`id` = '".$id."'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}

function getEmployees($limit = null, $offset = 0, $filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }

    if ($limit != null) {
        $sql = "SELECT * FROM employee JOIN user USING (id) " . filterObjToSQL($conn, $filters) . " LIMIT " . intval($limit) . " OFFSET " . intval($offset);
    } else {
        $sql = "SELECT * FROM employee JOIN user USING (id) " . filterObjToSQL($conn, $filters) . " ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(id) FROM employee JOIN user USING (id) " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}
