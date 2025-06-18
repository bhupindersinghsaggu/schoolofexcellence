<?php
include('header.php');

?>
<?php include 'db.php'; ?>
<style>
   

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
                                <h2>Upload Photo</h2>
                               
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 mb-6">
                                        <form method="POST" action="upload.php" enctype="multipart/form-data">
                                            <input class="form-control" type="text" name="title" placeholder="Image Title" required><br><br>
                                            <input class="form-control" type="date" name="date" required><br><br>
                                            <input class="form-control" type="url" name="url" placeholder="Image URL (optional)"><br><br>
                                            <input class="form-control" type="file" name="image" required><br><br>
                                            <button  type="submit" class="btn rounded-pill btn-primary">Upload</button>
                                        </form>
                                    </div>
                                </div>
                                <h2>Uploaded Photos</h2>
                                <div class="date-table">
                                <table class="table table-bordered table-responsive text-wrap">
                                    <tr style="font-weight: 600;">
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>URL</th>
                                        <!-- <th>Delete</th> -->
                                        <th>Edit/Delete</th>
                                    </tr>
                                    <?php
                                    $limit = 5; // records per page
                                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                    $start = ($page - 1) * $limit;

                                    // Count total records
                                    $total_result = $conn->query("SELECT COUNT(*) AS total FROM photos");
                                    $total_row = $total_result->fetch_assoc();
                                    $total_records = $total_row['total'];
                                    $total_pages = ceil($total_records / $limit);

                                    // Fetch limited records
                                    $res = $conn->query("SELECT * FROM photos ORDER BY id DESC LIMIT $start, $limit");
                                    while ($row = $res->fetch_assoc()):
                                    ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= htmlspecialchars($row['title']) ?></td>
                                            <td><?= $row['upload_date'] ?></td>
                                            <td><img src="uploads/<?= $row['image'] ?>"></td>
                                            <td><a href="<?= $row['url'] ?>" target="_blank"><?= $row['url'] ?></a></td>
                                            <!-- <td><a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this image?')">Delete</a></td> -->
                                            <td>
                                                <a href="edit.php?id=<?= $row['id'] ?>"> <button type="button" class="btn btn-icon btn-primary">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button></a>

                                                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this image?')"> <button type="button" class="btn btn-icon btn-danger">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button></a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </table>
                                </div>
                                <div style="margin-top:20px;">
                                    <?php if ($total_pages > 1): ?>
                                        <div style="text-align:center;">
                                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                <a href="?page=<?= $i ?>" style="margin:0 5px;<?= $i == $page ? 'font-weight:bold;' : '' ?>">
                                                    <?= $i ?>
                                                </a>
                                            <?php endfor; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
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
       