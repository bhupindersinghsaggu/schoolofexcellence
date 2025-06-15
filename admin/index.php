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

    <link rel="stylesheet" href="../css/style.css">
       <link rel="stylesheet" href="..css/feather.css">
   <link rel="stylesheet" href="..css/nice-select2.css">
   <link href="..css/glightbox.min.css" rel="stylesheet">
   <link rel="stylesheet" href="..css/nouislider.min.css">
   <link rel="stylesheet" href="..css/swiper-bundle.min.css">
   <!-- Style css -->
   <link rel="stylesheet" href="..css/style.css">
   <!-- Custom css -->
   <link rel="stylesheet" href="..css/custom.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



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
