<?php
include 'db.php';

$title = $_POST['title'];
$date = $_POST['date'];
$url = $_POST['url'];
$image = $_FILES['image']['name'];

$target = "uploads/" . basename($image);

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $stmt = $conn->prepare("INSERT INTO photos (title, upload_date, image, url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $date, $image, $url);
    $stmt->execute();
}

header("Location: upload-photo.php");
?>
