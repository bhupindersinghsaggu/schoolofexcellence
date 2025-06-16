<?php
$images = file_exists('data.json') ? json_decode(file_get_contents('data.json'), true) : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Photo Gallery Admin</title>
    <style>
        img { width: 150px; }
        table, th, td { border: 1px solid #ccc; border-collapse: collapse; padding: 10px; }
    </style>
</head>
<body>
<h2>Upload New Photo</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Name/URL: <input type="text" name="name" required><br><br>
    Date: <input type="date" name="date" required><br><br>
    Photo: <input type="file" name="image" accept="image/*" required><br><br>
    <input type="submit" value="Upload">
</form>

<hr>

<h2>Gallery</h2>
<table>
    <tr>
        <th>Photo</th>
        <th>Name/URL</th>
        <th>Date</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($images as $index => $img): ?>
    <tr>
        <td><img src="uploads/<?= htmlspecialchars($img['filename']) ?>"></td>
        <td><?= htmlspecialchars($img['name']) ?></td>
        <td><?= htmlspecialchars($img['date']) ?></td>
        <td>
            <form action="delete.php" method="post" onsubmit="return confirm('Delete this image?');">
                <input type="hidden" name="index" value="<?= $index ?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
