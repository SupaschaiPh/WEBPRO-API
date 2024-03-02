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

function uploadFileHandler($bucket_dir = "/../../bucket/upload/")
{
    $target_dir = __DIR__ .$bucket_dir;
    $upload_error_msg = "";
    if (isset($_FILES["image"])) {

        $file_name = $_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $file_error = $_FILES["image"]["error"];

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

        if (empty($upload_error_msg)) {
            $new_filename = uniqid() . "." . $file_extension;

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $upload_path = $target_dir . $new_filename;
            if (move_uploaded_file($tmp_name, $upload_path)) {
               return $upload_path;
            } else {
                $upload_error_msg = "Failed to move uploaded file.";
                return false;
            }
        }
    }
}
