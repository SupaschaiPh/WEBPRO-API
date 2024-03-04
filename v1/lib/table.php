<?php
include_once __DIR__ . "/../lib/util.php";

function getTables($limit = null, $offset = 0, $filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }

    if ($limit != null) {
        $sql = "SELECT *,table_info.active as 'table_acitve' FROM table_info LEFT OUTER JOIN table_order USING (table_id) LEFT OUTER JOIN user ON table_order.receive_id=user.id " . filterObjToSQL($conn, $filters) . " LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT *,table_info.active as 'table_acitve' FROM table_info LEFT OUTER JOIN table_order USING (table_id) LEFT OUTER JOIN user ON table_order.receive_id=user.id " . filterObjToSQL($conn, $filters) . ";";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(table_id) FROM table_info  LEFT OUTER JOIN table_order USING (table_id) " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}

function getTableInfo($limit = null, $offset = 0, $filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }

    if ($limit != null) {
        $sql = "SELECT * FROM table_info " . filterObjToSQL($conn, $filters) . " LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM table_info " . filterObjToSQL($conn, $filters) . " ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(table_id) FROM table_info " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}

function getTableStatus($limit = null, $offset = 0, $filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }

    if ($limit != null) {
        $sql = "SELECT * FROM table_status " . filterObjToSQL($conn, $filters) . " LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM table_status " . filterObjToSQL($conn, $filters) . " ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(table_status) FROM table_status " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}

function getTableOrder($limit = null, $offset = 0, $filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }

    if ($limit != null) {
        $sql = "SELECT * FROM table_order " . filterObjToSQL($conn, $filters) . " LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM table_order " . filterObjToSQL($conn, $filters) . " ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(table_order.id) FROM table_order " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}


function addTable($table_type, $position_x = null, $position_y = null, $priority = null, $table_status = null,$active=1)
{
    if(isset($active) && !($active==0 || $active==1)){
        $active==1;
    }
    include __DIR__ . "/../connect.php";
    try {
        $sql = "
        INSERT INTO `table_info`(
            `table_id`,
            `table_type`,
            `position_x`,
            `position_y`,
            `priority`,
            `table_status`,
            `active`
        )
        VALUES(
            NULL,
            '" . mysqli_real_escape_string($conn, $table_type) . "',
            " . setOrNull($conn, $position_x) . ",
            " . setOrNull($conn, $position_y) . ",
            " . setOrNull($conn, $priority) . ",
            " . setOrNull($conn, $table_status) . "
            " . $active . "
        )
        ";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}

function editTableInfo($table_id, $table_type, $position_x = null, $position_y = null, $priority = null, $table_status = null,$active=1)
{
    if (
        (
            !($position_x==null && $position_y==null && $priority==null)
        )
        &&
        (
        (!($position_x!=null && is_int($position_x))) &&
        (!($position_y!=null && is_int($position_y))) &&
        (!($priority!=null && is_int($priority)))
        )
    
    ) {
        return false;
    }
    if(isset($active) && !($active==0 || $active==1)){
        $active=1;
    }
    include __DIR__ . "/../connect.php";
    $setsql = "";
    $setsql = setSQLSet($conn, $setsql, "table_type", $table_type);
    $setsql = setSQLSet($conn, $setsql, "position_x", $position_x);
    $setsql = setSQLSet($conn, $setsql, "position_y", $position_y);
    $setsql = setSQLSet($conn, $setsql, "priority", $priority);
    $setsql = setSQLSet($conn, $setsql, "table_status", $table_status);
    $setsql = setSQLSet($conn, $setsql, "active", $active);
    try {
        $sql = "
        UPDATE 
            `table_info`
        SET
            " . $setsql . "
        WHERE
            `table_info`.table_id = " . mysqli_real_escape_string($conn, $table_id) . "
        ";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
        echo $th;
    }
}

function getTableType($limit = null, $offset = 0)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }

    if ($limit != null) {
        $sql = "SELECT * FROM table_type LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM table_type;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(table_type) FROM table_type ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}

function addTableType($table_type, $no_can_receive, $time_limit)
{
    include __DIR__ . "/../connect.php";
    if (!(is_int($no_can_receive) && (is_float($time_limit) || is_int($time_limit)))) {
        mysqli_close($conn);
        return false;
    }
    try {
        $sql = "INSERT INTO `table_type`(
            `table_type`,
            `no_can_receive`,
            `time_limit`
        )
        VALUES('" . mysqli_real_escape_string($conn, $table_type) . "', '" . mysqli_real_escape_string($conn, $no_can_receive) . "', '" . mysqli_real_escape_string($conn, $time_limit) . "')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}


function addTableStatus($table_status, $table_status_desc, $active = 1)
{
    include __DIR__ . "/../connect.php";
    if (!(is_int($active) && ($active == 1 || $active == 0))) {
        $active = 1;
    }
    try {
        $sql = "INSERT INTO `table_status`(
            `table_status`,
            `table_status_desc`,
            `active`
        )
        VALUES('" . mysqli_real_escape_string($conn, $table_status) . "', " . setOrNull($conn, $table_status_desc) . ", '" . mysqli_real_escape_string($conn, $active) . "')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}
function editTableStatus($table_status, $table_status_desc , $new_table_status, $active = 1)
{
    if (!(is_int($active) && ($active == 1 || $active == 0))) {
        $active = 1;
    }
    include __DIR__ . "/../connect.php";
    $setsql = "";
    $setsql = setSQLSet($conn, $setsql, "table_status", $new_table_status);
    $setsql = setSQLSet($conn, $setsql, "table_status_desc", $table_status_desc);
    $setsql = setSQLSet($conn, $setsql, "active", $active);
    try {
        $sql = "
        UPDATE 
            `table_status`
        SET
            " . $setsql . "
        WHERE
            `table_status`.table_status = '" . mysqli_real_escape_string($conn, $table_status) . "';
        ";
        mysqli_query($conn, $sql);
        return checkItEdited($conn);

    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}
