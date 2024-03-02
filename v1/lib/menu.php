<?php
include __DIR__ . "/../lib/util.php";

function getMenus($limit = null, $offset = 0)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }
    if ($limit != null) {
        $sql = "SELECT * FROM menu  LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM menu ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}

function getMenuType($limit = null, $offset = 0)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }
    if ($limit != null) {

        $sql = "SELECT * FROM menu_type  LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM menu_type ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(menu_type) FROM menu_type ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0];
    mysqli_close($conn);
    return $hold;
}

function addMenu($title, $description, $price, $img_url, $type)
{
    if(!(is_int($price) || is_float($price)))return false;
    include __DIR__ . "/../connect.php";
    try {
        
        $sql = "INSERT INTO `menu`(
            `title`,
            `description`,
            `price`,
            `last_update_date`,
            `img_url`,
            `type`
        )
        VALUES(
            '".mysqli_real_escape_string($conn,$title)."',
            '".mysqli_real_escape_string($conn,$description)."',
            '".mysqli_real_escape_string($conn,$price)."',
            ".getSQLdatetimeFormat().",
            '".mysqli_real_escape_string($conn,$img_url)."',
            '".mysqli_real_escape_string($conn,$type)."'
        )";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}
function addMenuType($menu_type, $description)
{
    include __DIR__ . "/../connect.php";
    try {
        $sql = "INSERT INTO `menu_type`(`menu_type`, `description`)
        VALUES('" . mysqli_real_escape_string($conn, $menu_type) . "', '" . mysqli_real_escape_string($conn, $description) . "');";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}
