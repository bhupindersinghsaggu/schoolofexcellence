<?php
$index = $_GET['index'];
$data = file_exists('data.json') ? json_decode(file_get_contents('data.json'), true) : [];

if (!isset($data[$index])) {
    die("Invalid photo index.");
}

$item = $data[$index];
?>
<?php include('header.php') ?>

<body>
    <div class="dashbaord-cover bg-shade sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <div class="dash-cover-bg rounded-3" style="background-image: url('/images/student_bg.jpg');"></div>
                    <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
                        <!-- <div class="ava-wrap d-flex align-items-center">
                            <div class="avatar me-3 rounded-circle"><img width="150" src="images/avatar.png" class="rounded-circle" alt="Avatar"></div>
                            <div class="ava-info">
                                <h4 class="display-5 text-white mb-0">Maria Carey Mc.</h4>
                                <div class="ava-meta text-white mt-1">
                                    <span><img width="20" src="images/icons/star.png" alt="">4.8 </span>
                                    <span><i class="feather-icon icon-users"></i>25k Students </span>
                                </div>
                            </div>
                        </div> -->
                        <!-- <a href="instructor-create-course.html" class="btn btn-sm btn-info rounded-5"><i class="feather-icon icon-plus me-2"></i>Add New
                            Course</a> -->
                    </div>
                </div>
            </div>
            <!-- Dashboard Inner Start -->
            <div class="row mt-5">
                <div class="col-lg-3">
                    <div class="col-lg-3">
                        <?php include('aside.php') ?>
                    </div>
                </div>
                <div class="col-lg-9 ps-lg-4">
                    <section class="dashboard-sec">
                        <h4>Edit Photo Gallery</h4>
                        <form action="update.php" method="post">
                            <div class="container">
                                <div class="row">
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
                                        <input type="submit" value="Update" class="btn d-none d-lg-block btn-primary shadow border-0 rounded-2">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>