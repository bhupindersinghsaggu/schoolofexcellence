<style>
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .photo-card {
        border: 1px solid #ccc;
        padding: 10px;
        background: #fff;
        border-radius: 8px;
        text-align: center;
    }

    .photo-card img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
</style>



<?php include 'db.php'; ?>
<h2>Photo Gallery</h2>
<a href="upload.php">Upload New Photo</a><br><br>



<?php
$result = $conn->query("SELECT * FROM photos ORDER BY uploaded_at DESC");
echo '<div style="display:flex; flex-wrap:wrap; gap:20px;">';
while ($row = $result->fetch_assoc()) {
    echo '<div style="border:1px solid #ccc; padding:10px; width:200px;">';
    echo '<img src="uploads/' . htmlspecialchars($row['filename']) . '" width="100%"><br>';
    echo '<strong>' . htmlspecialchars($row['title']) . '</strong><br>';
    echo '<p>' . htmlspecialchars($row['description']) . '</p>';
    echo '<strong>' . htmlspecialchars($row['image_title']) . '</strong><br>';
    echo '<small>' . htmlspecialchars($row['image_date']) . '</small><br>';
    echo '<a href="edit.php?id=' . $row['id'] . '">Edit</a> | ';
    echo '<a href="delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Delete this photo?\')">Delete</a>';
    echo '</div>';
}
echo '</div>';
?>