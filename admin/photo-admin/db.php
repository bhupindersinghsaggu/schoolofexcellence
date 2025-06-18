<?php
$conn = new mysqli("localhost", "root", "", "soe2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>