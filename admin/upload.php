<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $image = $_FILES['image'];

    if ($image['error'] === UPLOAD_ERR_OK) {
        $filename = uniqid() . '_' . basename($image['name']);
        $target = 'uploads/' . $filename;
        move_uploaded_file($image['tmp_name'], $target);

        $data = file_exists('data.json') ? json_decode(file_get_contents('data.json'), true) : [];
        $data[] = ['name' => $name, 'date' => $date, 'filename' => $filename];
        file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
    }
}
header('Location: index.php');
