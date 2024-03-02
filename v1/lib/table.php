<?php
include __DIR__ . "/../lib/util.php";
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
        $sql = "SELECT * FROM table_info LEFT OUTER JOIN table_order USING (table_id) LEFT OUTER JOIN user ON table_order.receive_id=user.id ". filterObjToSQL($conn, $filters) . " LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM table_info LEFT OUTER JOIN table_order USING (table_id) LEFT OUTER JOIN user ON table_order.receive_id=user.id ". filterObjToSQL($conn, $filters) . ";";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(table_id) FROM table_info ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}

function getTableInfo($limit = null, $offset = 0)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }

    if ($limit != null) {
        $sql = "SELECT * FROM table_info LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM table_info;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(table_id) FROM table_info ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}


function addTable($table_type,$position_x = null,$position_y = null,$priority = null,$table_status=null)
{
    include __DIR__ . "/../connect.php";
    try {
        $sql = "
        INSERT INTO `table_info`(
            `table_id`,
            `table_type`,
            `position_x`,
            `position_y`,
            `priority`,
            `table_status`
        )
        VALUES(
            NULL,
            '" . mysqli_real_escape_string($conn, $table_type) . "',
            ".setOrNull($conn,$position_x).",
            ".setOrNull($conn,$position_y).",
            ".setOrNull($conn,$priority).",
            ".setOrNull($conn,$table_status)."
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
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(table_id) FROM table_info ;"));
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
