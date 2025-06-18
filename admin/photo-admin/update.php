
<?php include 'db.php'; 
$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$url = $_POST['url'];
?>
<style>
    body {
        font-family: Arial;
        margin: 20px;
    }

    form {
        margin-bottom: 30px;
    }

    img {
        width: 100px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    input[type="text"],
    input[type="date"],
    input[type="url"] {
        width: 100%;
        padding: 5px;
    }
</style>
<!-- Content wrapper -->
<?php
// If image is uploaded

if ($_FILES['image']['name']) {
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    // Delete old image
    $res = $conn->query("SELECT image FROM photos WHERE id=$id");
    $old = $res->fetch_assoc();
    if ($old && file_exists("uploads/" . $old['image'])) {
        unlink("uploads/" . $old['image']);
    }

    $stmt = $conn->prepare("UPDATE photos SET title=?, upload_date=?, image=?, url=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $date, $image, $url, $id);
} else {
    // No new image
    $stmt = $conn->prepare("UPDATE photos SET title=?, upload_date=?, url=? WHERE id=?");
    $stmt->bind_param("sssi", $title, $date, $url, $id);
}

$stmt->execute();
header("Location: upload.php");
?>