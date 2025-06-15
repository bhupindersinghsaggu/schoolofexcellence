<?php
$uploadDir = 'uploads/';
$dataFile = 'data.json';

// Load photo metadata
$photosData = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
?>


    <h1>Photo Gallery</h1>

    <?php foreach ($photosData as $filename => $info): ?>
        <div style="margin:10px; display:inline-block;">
            <img src="uploads/<?php echo htmlspecialchars($filename); ?>" width="200"><br>
            <strong>Date:</strong> <?php echo htmlspecialchars($info['date']); ?><br>
            <a href="<?php echo htmlspecialchars($info['link']); ?>" target="_blank">Visit Link</a>
        </div>
    <?php endforeach; ?>

