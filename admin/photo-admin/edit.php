<?php
include('header.php');

?>
<?php include 'db.php'; 
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM photos WHERE id = $id");
$row = $res->fetch_assoc();?>
<style>
    body {
        font-family: Arial;
        margin: 20px;
    }

    form {
        margin-bottom: 30px;
    }

    img {
        width: 100px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    input[type="text"],
    input[type="date"],
    input[type="url"] {
        width: 100%;
        padding: 5px;
    }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                    <div class="avatar flex-shrink-0">
                                        <img src="assets/img/icons/unicons/chart-success.png" alt="chart success"
                                            class="rounded">
                                    </div>
                                </div>
                                <h3 class="mb-1">Photo Gallery Admin</h3>
                                <h2>Edit Photo</h2>
                                <form method="POST" action="update.php" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required><br><br>
                                    <input type="date" name="date" value="<?= $row['upload_date'] ?>" required><br><br>
                                    <input type="url" name="url" value="<?= htmlspecialchars($row['url']) ?>"><br><br>
                                    <img src="uploads/<?= $row['image'] ?>" width="100"><br><br>
                                    <input type="file" name="image"><br>(Leave empty to keep existing)<br><br>
                                    <button type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <?php
        include('footer.php')
        ?>