<?php
include_once __DIR__ . "/../lib/util.php";

function getMenus($limit = null, $offset = 0,$filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }
    if ($limit != null) {
        $sql = "SELECT * FROM menu " . filterObjToSQL($conn, $filters) . "  LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM menu " . filterObjToSQL($conn, $filters) . " ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(menu_id) FROM menu " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}

function getMenuType($limit = null, $offset = 0,$filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }
    if ($limit != null) {
        $sql = "SELECT * FROM menu_type " . filterObjToSQL($conn, $filters) . "  LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM menu_type " . filterObjToSQL($conn, $filters) . " ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(menu_type) FROM menu_type ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
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

function editMenu($id,$title = null, $description = null, $price = null, $img_url = null, $type = null,$active = 1)
{
    //if($price != null && !(is_int($price) || is_float($price)))return false;
    //if(isset($active) && !($active==0 || $active==1))return false;
    //if(!isset($active))$active=1;
    include __DIR__ . "/../connect.php";
    $setsql = "";
    $setsql = setSQLSet($conn, $setsql, "title", $title);
    $setsql = setSQLSet($conn, $setsql, "description", $description);
    $setsql = setSQLSet($conn, $setsql, "price", $price);
    $setsql = setSQLSet($conn, $setsql, "img_url", $img_url);
    $setsql = setSQLSet($conn, $setsql, "type", $type);
    $setsql = setSQLSet($conn, $setsql, "active", $active);
    try {
        $sql = "UPDATE
                    `menu`
                SET
                    ".$setsql."
                WHERE
                    `menu`.`menu_id` = '".mysqli_real_escape_string($conn,$id)."';";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}


function editMenuType($menu_type, $description,$new_menu_type ,$active=null)
{
    if(isset($active) && !($active==0 || $active==1))return false;
    include __DIR__ . "/../connect.php";
    $setsql = "";
    $setsql = setSQLSet($conn, $setsql, "description", $description);
    $setsql = setSQLSet($conn, $setsql, "menu_type", $new_menu_type);
    $setsql = setSQLSet($conn, $setsql, "active", $active);

    try {
        $sql = "UPDATE
                    `menu_type`
                SET
                    ".$setsql."
                WHERE
                `menu_type`.menu_type = '".mysqli_real_escape_string($conn,$menu_type)."';";
        mysqli_query($conn, $sql);
        return checkItEdited($conn);
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}
