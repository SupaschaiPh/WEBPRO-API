<?php

function checkRequirekeyQuery(array $array, array $checkquery)
{
    foreach ($checkquery as $key) {
        if (!key_exists($key, $array)) {
            echo json_encode(
                array(
                    "status" => "fail",
                    "mss" => "missing key " . $key . " reqiure"
                )
            );
            die();
        }
    }
}

function bodyCanNull($array,$keys){
    foreach ($keys as $key) {
        if (!key_exists($key, $array)) {
            $array[$key] = null;
        }
    }
    return $array;
}

function uploadFileHandler($bucket_dir = "/bucket/upload/")
{
    $target_dir = __DIR__."/..".$bucket_dir;
    $upload_error_msg = "";
    if (isset($_FILES["files"])) {
        $file_name = $_FILES["files"]["name"];
        $tmp_name = $_FILES["files"]["tmp_name"];
        $file_error = $_FILES["files"]["error"];

        $allowed_extensions = ["jpg", "jpeg", "png", "gif", "webp"];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $upload_error_msg = "Invalid file type. Only jpg, jpeg, png, gif and webp allowed.";
        }

        if ($file_error !== UPLOAD_ERR_OK) {
            switch ($file_error) {
                case UPLOAD_ERR_INI_SIZE:
                    $upload_error_msg = "The uploaded file exceeds the upload limit.";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $upload_error_msg = "The uploaded file exceeds the form size limit.";
                    break;
                default:
                    $upload_error_msg = "An unknown error occurred during upload.";
            }
        }


        if (strcmp($upload_error_msg,"")==0) {
            $new_filename = uniqid() . "." . str_replace(" ","",$file_extension);

            if (!is_dir($target_dir) && !file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $upload_path = $target_dir . $new_filename;
            
            $upload_path = str_replace("","",$upload_path);

            if (move_uploaded_file($tmp_name, $upload_path)) {
                $upload_path = str_replace("/var/www/html/v1/..","",$upload_path);
               return $upload_path;
            } else {
                $upload_error_msg = "Failed to move uploaded file.";
                return false;
            }
        }else{
            return false;
        }
    }
}
