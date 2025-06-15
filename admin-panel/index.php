<?php
$uploadDir = 'uploads/';
$dataFile = 'data.json';

// Load existing data
$photosData = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $fileName = basename($_FILES['photo']['name']);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
        $photosData[$fileName] = [
            'date' => $_POST['date'] ?? '',
            'link' => $_POST['link'] ?? ''
        ];
        file_put_contents($dataFile, json_encode($photosData, JSON_PRETTY_PRINT));
        echo "Photo uploaded successfully.";
    } else {
        echo "Error uploading photo.";
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $fileToDelete = basename($_GET['delete']);
    $filePath = $uploadDir . $fileToDelete;

    if (file_exists($filePath)) {
        unlink($filePath);
        unset($photosData[$fileToDelete]);
        file_put_contents($dataFile, json_encode($photosData, JSON_PRETTY_PRINT));
        echo "Photo deleted.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Photo Gallery</title>
</head>
<body>
    <h2>Upload Photo</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo" required><br><br>
        <label>Date:</label>
        <input type="date" name="date" required><br><br>
        <label>Link URL:</label>
        <input type="url" name="link" required><br><br>
        <button type="submit">Upload</button>
    </form>

    <h2>Uploaded Photos</h2>
    <?php foreach ($photosData as $filename => $info): ?>
        <div style="margin: 10px; display:inline-block;">
            <img src="uploads/<?php echo htmlspecialchars($filename); ?>" width="150"><br>
            <strong>Date:</strong> <?php echo htmlspecialchars($info['date']); ?><br>
            <a href="<?php echo htmlspecialchars($info['link']); ?>" target="_blank">Visit Link</a><br>
            <a href="?delete=<?php echo urlencode($filename); ?>" onclick="return confirm('Are you sure you want to delete this photo?');">Delete</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
