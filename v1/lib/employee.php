<?php
include_once __DIR__ . "/../lib/util.php";

function regisEmployee($id, $name, $lastname, $address, $duty,$salary  = null,$profile_url = null)
{
    if($salary!=null &&  (is_int($salary) || is_float($salary)))return false;

    include __DIR__ . "/../connect.php";
    try {
        $sql = "INSERT INTO `employee`(
            `id`,
            `e_name`,
            `e_lastname`,
            `duty`,
            `address`,
            `start_date`,
            `salary`,
            `profile_url`
        )
        VALUES(
            '" . mysqli_real_escape_string($conn, $id) . "',
            " . setOrNull($conn, $name) . ",
            " . setOrNull($conn, $lastname) . ",
            " . setOrNull($conn, $duty) . ",
            " . setOrNull($conn, $address) . ",
            " . getSQLdatetimeFormat() . ",
            " . setOrNull($conn, $salary) . ",
            " . setOrNull($conn, $profile_url) . "
        )";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}

function editEmployee($id, $e_name, $e_lastname, $address, $duty,$salary,$start_date,$end_date,$profile_url)
{
    if($salary!=null &&  (is_int($salary) || is_float($salary)))return false;
    include __DIR__ . "/../connect.php";
    $setsql = "";
    $setsql = setSQLSet($conn, $setsql, "e_name", $e_name);
    $setsql = setSQLSet($conn, $setsql, "e_lastname", $e_lastname);
    $setsql = setSQLSet($conn, $setsql, "duty", $duty);
    $setsql = setSQLSet($conn, $setsql, "address", $address);
    $setsql = setSQLSet($conn, $setsql, "salary", $salary);
    $setsql = setSQLSet($conn, $setsql, "start_date", $start_date);
    $setsql = setSQLSet($conn, $setsql, "end_date", $end_date);
    $setsql = setSQLSet($conn, $setsql, "profile_url", $profile_url);
    try {
        $sql = "UPDATE
                    `employee`
                SET
                    ".$setsql."
                WHERE
                    `employee`.`id` = '".$id."'";
        mysqli_query($conn, $sql);
        return checkItEdited($conn);
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
        $sql = "SELECT *, 'xxxxxx' as 'password' FROM employee JOIN user USING (id) " . filterObjToSQL($conn, $filters) . " LIMIT " . intval($limit) . " OFFSET " . intval($offset);
    } else {
        $sql = "SELECT *, 'xxxxxx' as 'password' FROM employee JOIN user USING (id) " . filterObjToSQL($conn, $filters) . " ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(id) FROM employee JOIN user USING (id) " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}
