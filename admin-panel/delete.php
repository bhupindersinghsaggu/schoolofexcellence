<?php
include 'db.php';
$id = $_GET['id'];

// Delete file
$result = $conn->query("SELECT filename FROM photos WHERE id = $id");
if ($row = $result->fetch_assoc()) {
    unlink('uploads/' . $row['filename']);
}

// Delete record
$conn->query("DELETE FROM photos WHERE id = $id");
header('Location: index.php');
