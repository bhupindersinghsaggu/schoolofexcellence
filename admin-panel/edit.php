<?php include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM photos WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $image_title = $_POST['image_title'];
    $image_date = $_POST['image_date'];

    $stmt = $conn->prepare("UPDATE photos SET title=?, description=?, image_title=?, image_date=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $desc, $image_title, $image_date, $id);
    $stmt->execute();
    echo "Updated! <a href='index.php'>Back to gallery</a>";
    exit;
}

?>

<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>"><br>
    <textarea name="description"><?= htmlspecialchars($row['description']) ?></textarea><br>
    <input type="text" name="image_title" value="<?= htmlspecialchars($row['image_title']) ?>"><br>
    <input type="date" name="image_date" value="<?= htmlspecialchars($row['image_date']) ?>"><br>
    <button type="submit">Update</button>
</form>