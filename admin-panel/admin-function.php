
<?php
$uploadDir = 'uploads/';

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $fileName = basename($_FILES['photo']['name']);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
        echo "Photo uploaded successfully.";
    } else {
        echo "Error uploading photo.";
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $fileToDelete = $uploadDir . basename($_GET['delete']);
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        echo "Photo deleted.";
    }
}

// Get all photos
$photos = array_diff(scandir($uploadDir), ['.', '..']);
?>

<?php
$uploadDir = 'uploads/';
$dataFile = 'data.json';

// Load photo metadata
$photosData = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
?>