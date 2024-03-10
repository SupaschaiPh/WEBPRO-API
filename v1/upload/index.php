<?php

// Define target directory and error message placeholder
$target_dir = __DIR__ . "/../../bucket/upload/";
$upload_error_msg = "";

if (isset($_FILES["image"])) {

    $file_name = $_FILES["image"]["name"];
    $file_type = $_FILES["image"]["type"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $file_error = $_FILES["image"]["error"];

    $allowed_extensions = ["jpg", "jpeg", "png", "gif" , "webp"];
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
            $upload_path = str_replace("var/www/html/v1/upload/","",$upload_path);
            $upload_path = str_replace("../","",$upload_path);
            echo "<img src='".$_SERVER["HTTP_ORIGIN"]."".$upload_path."'/>";
           
        } else {
            $upload_error_msg = "Failed to move uploaded file.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>

<body>
    <?php if (!empty($upload_error_msg)) : ?>
        <p style="color: red;"><?php echo $upload_error_msg; ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image">
        <br>
        <button type="submit">Upload</button>
    </form>
</body>

</html>
