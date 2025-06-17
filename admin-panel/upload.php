<?php include 'db.php'; ?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="image_title" placeholder="Image Title" required><br>
    <input type="date" name="image_date" required><br>
    <input type="text" name="title" placeholder="Uploader Name" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="file" name="image" accept="image/*" required><br>
    <button type="submit">Upload</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $image_title = $_POST['image_title'];
    $image_date = $_POST['image_date'];
    $image = $_FILES['image'];

    if ($image['error'] === UPLOAD_ERR_OK) {
        $filename = uniqid() . '_' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);

        $stmt = $conn->prepare("INSERT INTO photos (title, description, filename, image_title, image_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $desc, $filename, $image_title, $image_date);
        $stmt->execute();
        echo "Photo uploaded!";
    }
}

?>