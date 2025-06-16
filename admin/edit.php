<?php
$index = $_GET['index'];
$data = file_exists('data.json') ? json_decode(file_get_contents('data.json'), true) : [];

if (!isset($data[$index])) {
    die("Invalid photo index.");
}

$item = $data[$index];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Photo Gallery Admin</title>
    <style>
        img {
            width: 50px;
        }
    </style>
</head>
<link rel="stylesheet" href="../css/feather.css">
<link rel="stylesheet" href="../css/nice-select2.css">
<link rel="stylesheet" href="../css/glightbox.min.css">
<link rel="stylesheet" href="css/swiper-bundle.min.css">
<!-- Style css -->
<link rel="stylesheet" href="../css/style.css">
<!-- Custom css -->
<link rel="stylesheet" href="../css/custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
    <div class="dashbaord-cover bg-shade sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <div class="dash-cover-bg rounded-3" style="background-image: url('images/student_bg.jpg');"></div>
                    <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
                        <div class="ava-wrap d-flex align-items-center">
                            <div class="avatar me-3 rounded-circle"><img width="150" src="images/avatar.png" class="rounded-circle" alt="Avatar"></div>
                            <div class="ava-info">
                                <h4 class="display-5 text-white mb-0">Maria Carey Mc.</h4>
                                <div class="ava-meta text-white mt-1">
                                    <span><img width="20" src="images/icons/star.png" alt="">4.8 </span>
                                    <span><i class="feather-icon icon-users"></i>25k Students </span>
                                </div>
                            </div>
                        </div>
                        <a href="instructor-create-course.html" class="btn btn-sm btn-info rounded-5"><i class="feather-icon icon-plus me-2"></i>Add New
                            Course</a>
                    </div>
                </div>
            </div>
            <!-- Dashboard Inner Start -->
            <div class="row mt-5">
                <div class="col-lg-3">
                    <aside class="dashboard-sidebar shadow-1 border rounded-3">
                        <div class="widget">
                            <p class="grettings">Welcome, Maria Carey</p>
                            <nav class="dashboard-nav">
                                <ul class="list-unstyled nav">
                                    <li><a class="nav-link active" href="index.php"><i class="feather-icon icon-home"></i><span>Dashboard</span></a></li>
                                    <li><a class="nav-link" href="instructor-profile.html"><i class="feather-icon icon-user"></i><span>My
                                                Profile</span></a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="widget">
                            <p class="grettings">User</p>
                            <nav class="dashboard-nav">
                                <ul class="list-unstyled nav">
                                    <li><a class="nav-link" href="instructor-settings.html"><i class="feather-icon icon-settings"></i><span>Settings</span></a></li>
                                    <li><a class="nav-link" href="index.html"><i class="feather-icon icon-log-out"></i><span>Logout</span></a></li>
                                </ul>
                            </nav>
                        </div><!--  Widget End -->
                    </aside>
                </div>
                <div class="col-lg-9 ps-lg-4">
                    <section class="dashboard-sec mt-5 ">
                        <h4>Edit Photo Gallery</h4>
                        <form action="update.php" method="post">
                            <div class="col-lg-6 form-group mt-20">
                                <input class="form-control" type="hidden" name="index" placeholder="Title" value="<?= $index ?>">
                            </div>
                            <div class="col-lg-6 form-group mt-20">
                                <input class="form-control" type="text" name="title" placeholder="Title" value="<?= htmlspecialchars($item['title']) ?>" required>
                            </div>
                            <div class="col-lg-6 form-group mt-20">
                                <input class="form-control" type="text" name="name" placeholder="URL" value="<?= htmlspecialchars($item['name']) ?>" required>
                            </div>
                            <div class="col-lg-6 form-group mt-20">
                                <input class="form-control" type="date" name="date" placeholder="Date" value="<?= htmlspecialchars($item['date']) ?>" required>
                            </div>
                            <div class="col-lg-6 form-group mt-20">
                                <input class="form-control" type="text" name="text" placeholder="Description" value="<?= htmlspecialchars($item['text']) ?>" required>
                            </div>
                            <div class="col-lg-6 form-group mt-20">
                                <input  type="submit" value="Update" class="btn d-none d-lg-block btn-primary shadow border-0 rounded-2">
                            </div>
                        </form>
                        <hr>
                        <!-- <h2>Gallery</h2>
                        <table class="table table-responsive">
                            <tr>
                                <th>Photo</th>
                                <th>title</th>
                                <th>URL</th>
                                <th>Date</th>
                                <th>text</th>
                                <th>Delete</th>
                            </tr>
                            <?php foreach ($images as $index => $img): ?>
                                <tr>
                                    <td><img src="uploads/<?= htmlspecialchars($img['filename']) ?>"></td>
                                    <td><?= htmlspecialchars($img['title']) ?></td>
                                    <td><?= htmlspecialchars($img['name']) ?></td>
                                    <td><?= htmlspecialchars($img['date']) ?></td>
                                    <td><?= htmlspecialchars($img['text']) ?></td>
                                    <td>
                                        <form action="delete.php" method="post" onsubmit="return confirm('Delete this image?');">
                                            <input type="hidden" name="index" value="<?= $index ?>">
                                            <input type="submit" value="Delete">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="edit.php" method="get">
                                            <input type="hidden" name="index" value="<?= $index ?>">
                                            <input type="submit" value="Edit">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table> -->
                    </section>
                </div>
            </div>
        </div>
    </div>


    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="../js/nice-select2.js"></script>
    <script src="../js/glightbox.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/purecounter_vanilla.js"></script>
    <script src="../js/lenis.min.js"></script>
    <script src="../js/custom.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"94a775a3bdd1e1a4","version":"2025.5.0","r":1,"token":"389fa74406c44f21b129709ce8a3ec16","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}' crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>