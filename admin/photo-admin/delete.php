<?php
include 'db.php';
$id = $_GET['id'];

// Get image name
$res = $conn->query("SELECT image FROM photos WHERE id=$id");
$row = $res->fetch_assoc();
unlink("uploads/" . $row['image']);

$conn->query("DELETE FROM photos WHERE id=$id");

header("Location:upload-photo.php");
?>
