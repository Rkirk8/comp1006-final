<?php
require 'include/auth.php';
require 'include/db.php';

$uploadDir = 'img/';

// Check if the logo file was uploaded
if (!empty($_FILES['logo']['name'])) {
    $image = $_FILES['logo'];

    // Check for upload errors
    if ($image['error'] !== UPLOAD_ERR_OK) {
        echo '<h5 class="alert alert-danger">Invalid logo upload</h5>';
        exit();
    }

    // Check if the uploaded file is an image
    $info = getimagesize($image['tmp_name']);
    if ($info === false) {
        echo '<h5 class="alert alert-danger">Not an image file</h5>';
        exit();
    }

    // Check if the image type is supported
    $supported = array('image/png'); // Only supporting PNG for now
    if (!in_array($info['mime'], $supported)) {
        echo '<h5 class="alert alert-danger">Unsupported image type</h5>';
        exit();
    }

    // Check if the image size is within limits
    $maxSize = 100000; // 100 KB
    if ($image['size'] > $maxSize) {
        echo '<h5 class="alert alert-danger">Image size exceeds limit</h5>';
        exit();
    }

    // Generate a unique filename to prevent overwriting existing files
    $uniqueFilename = uniqid('logo_') . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
    $uploadFile = $uploadDir . $uniqueFilename;

    // Move the uploaded file to the designated directory
    if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
        echo '<h5 class="alert alert-success">Logo uploaded successfully</h5>';

    } else {
        echo '<h5 class="alert alert-danger">Failed to upload logo</h5>';
        exit();
    }
} else {
    // Handle case where no file was uploaded
    echo '<h5 class="alert alert-danger">No logo uploaded</h5>';
    exit();
}

// Close the database connection if needed
$db = null;
header('location:index.php');
?>

