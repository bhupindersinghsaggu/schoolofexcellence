<?php
$dataFile = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image'];
    if ($image['error'] === 0) {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $ext;
        move_uploaded_file($image['tmp_name'], "uploads/$filename");

        $url = "uploads/$filename";
        $date = date('Y-m-d H:i:s');

        $images = json_decode(file_get_contents($dataFile), true);
        $images[] = ['url' => $url, 'date' => $date];
        file_put_contents($dataFile, json_encode($images, JSON_PRETTY_PRINT));
    }
}

$images = json_decode(file_get_contents($dataFile), true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Image Gallery</title>
    <style>
        img { max-width: 200px; height: auto; display: block; }
        .image { margin: 10px; display: inline-block; border: 1px solid #ccc; padding: 10px; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>

<h2>Upload Image</h2>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <button type="submit">Upload</button>
</form>

<h2>Gallery</h2>
<?php foreach ($images as $index => $img): ?>
    <div class="image">
        <img src="<?= htmlspecialchars($img['url']) ?>" alt="Image">
        <p>URL: <?= htmlspecialchars($img['url']) ?></p>
        <p>Date: <?= htmlspecialchars($img['date']) ?></p>
        <form method="post" action="delete.php" onsubmit="return confirm('Delete this image?');">
            <input type="hidden" name="index" value="<?= $index ?>">
            <button type="submit">Delete</button>
        </form>
    </div>
<?php endforeach; ?>

</body>
</html>
