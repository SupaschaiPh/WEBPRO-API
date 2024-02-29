<?php

function getOrder($limit = null, $offset = 0)
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
            LEFT OUTER JOIN USER ON order_bill.order_by = user.id LIMIT ' . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        //Code
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
            LEFT OUTER JOIN USER ON order_bill.order_by = user.id;';
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}
