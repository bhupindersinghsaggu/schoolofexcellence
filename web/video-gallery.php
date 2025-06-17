<?php
$dataFile = 'admin/video-gallery/data.json'; // correct path
$data = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Video Gallery</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f9f9f9; }
        .gallery-container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .video-card {
            width: 320px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
            padding: 10px;
        }
        .video-card img {
            width: 100%;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }
        .video-card h4 {
            margin: 10px 0 5px;
        }
        .video-card p {
            margin: 0;
            font-size: 0.9em;
            color: #666;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.8);
            justify-content: center;
            align-items: center;
        }
        .modal iframe {
            width: 80%;
            height: 80%;
            max-width: 800px;
        }
        .close {
            position: absolute;
            top: 20px; right: 30px;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Our Video Gallery</h2>
<div class="gallery-container">
<?php foreach (array_reverse($data) as $item): ?>
    <div class="video-card">
        <img src="<?= htmlspecialchars($item['thumbnail']) ?>" alt="Thumbnail" onclick="openModal('<?= $item['youtube_id'] ?>')">
        <h4><?= htmlspecialchars($item['title']) ?></h4>
        <p><?= htmlspecialchars($item['date']) ?> – <?= htmlspecialchars($item['name']) ?></p>
    </div>
<?php endforeach; ?>
</div>

<div id="modal" class="modal" onclick="closeModal()">
    <span class="close">&times;</span>
    <iframe id="modalVideo" src="" frameborder="0" allowfullscreen></iframe>
</div>

<script>
function openModal(videoId) {
    document.getElementById('modal').style.display = 'flex';
    document.getElementById('modalVideo').src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
}
function closeModal() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('modalVideo').src = '';
}
</script>

</body>
</html>
