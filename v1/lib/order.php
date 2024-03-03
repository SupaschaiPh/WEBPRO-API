<?php
include __DIR__ . "/../lib/util.php";

function getOrder($limit = null, $offset = 0, $filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }
    if ($limit != null) {
        $sql = 'SELECT
                order_bill.id,
                table_id,
                description,
                order_bill.status,
                waiter_id,
                employee.name as "waiter_name",
                employee.lastname as "waiter_lastname",
                order_by,
                user.name as "order_by_name",
                user.lastname as "order_by_lastname",
                price,
                order_bill.date,
                order_bill.time_stamp,
                order_bill.discount
            FROM
                `order_bill`
            LEFT OUTER JOIN order_transaction ON order_bill.id = order_transaction.id
            LEFT OUTER JOIN employee ON order_bill.waiter_id = employee.id
            LEFT OUTER JOIN USER ON order_bill.order_by = user.id 
            ' . filterObjToSQL($conn, $filters) . ' 
            LIMIT ' . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        //Code
        $sql = 'SELECT
                order_bill.id,
                table_id,
                description,
                order_bill.status,
                waiter_id,
                employee.e_name as "waiter_name",
                employee.e_lastname as "waiter_lastname",
                order_by,
                user.name as "order_by_name",
                user.lastname as "order_by_lastname",
                price,
                order_bill.date,
                order_bill.time_stamp,
                order_bill.discount
            FROM
                `order_bill`
            LEFT OUTER JOIN order_transaction ON order_bill.id = order_transaction.id
            LEFT OUTER JOIN employee ON order_bill.waiter_id = employee.id
            LEFT OUTER JOIN USER ON order_bill.order_by = user.id
            ' . filterObjToSQL($conn, $filters) . ';';
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "
    SELECT 
    count(order_bill.id) FROM order_bill 
    LEFT OUTER JOIN order_transaction ON order_bill.id = order_transaction.id
    LEFT OUTER JOIN employee ON order_bill.waiter_id = employee.id
    LEFT OUTER JOIN USER ON order_bill.order_by = user.id 
    " . filterObjToSQL($conn, $filters) . ";"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}

function getOrderStatus($limit = null, $offset = 0, $filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }
    if ($limit != null) {
        $sql = 'SELECT
                *
            FROM
                `order_status`
            ' . filterObjToSQL($conn, $filters) . ' 
            LIMIT ' . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        //Code
        $sql = 'SELECT
                    *
                FROM
                    `order_status`
            ' . filterObjToSQL($conn, $filters) . ';';
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "
    SELECT 
    count(order_status) FROM `order_status`
    " . filterObjToSQL($conn, $filters) . ";"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}


function addOrderStatus($order_status, $description = null)
{
    include __DIR__ . "/../connect.php";
    try {
        $sql = "INSERT INTO `order_status` (`order_status`, `description`) 
    VALUES ('" . mysqli_real_escape_string($conn, $order_status) . "', " . setOrNull($conn, $description) . ")";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}
function addOrderBill($table_id, $description, $status, $waiter_id = null, $order_by = null, $price = 0, $discount = 0)
{
    if (
        ((is_int($price) || is_float($price))) && 
        (isset($discount)&&(is_int($discount) || is_float($discount)))
    ) return false;
    if(!isset($discount))$discount = 0;
    include __DIR__ . "/../connect.php";
    try {
        $sql = "INSERT INTO `order_bill`(
            `id`,
            `table_id`,
            `description`,
            `status`,
            `waiter_id`,
            `order_by`,
            `price`,
            `date`,
            `time_stamp`,
            `discount`
        )
        VALUES(
            NULL,
            '" . mysqli_real_escape_string($conn, $table_id) . "',
            " . setOrNull($conn, $description) . ",
            '" . mysqli_real_escape_string($conn, $status) . "',
            " . setOrNull($conn, $waiter_id) . ",
            " . setOrNull($conn, $order_by) . ",
            " . setOrNull($conn, $price) . ",
            " . getSQLdatetimeFormat() . ",
            NOW(), 
            " . setOrNull($conn, $discount) . ");";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}
