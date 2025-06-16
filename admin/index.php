<?php
$images = file_exists('data.json') ? json_decode(file_get_contents('data.json'), true) : [];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="An ideal tempalte for online education, e-Learning, Course School, Online School, Kindergarten, Classic LMS, University, Language Academy, Coaching, Online Course, Single Course, and Course marketplace.">
    <meta name="keywords"
        content="bootstrap 5, online course, education, creative, gulp, business, minimal, modern, course, one page, responsive, saas, e-Learning, seo, startup, html5, site template">
    <meta name="author" content="theme-village">

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
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
    <div class="dashbaord-promo position-relative"></div>
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
                        <h4>Create Photo Gallery</h4>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 form-group mt-20">
                                        <input class="form-control" name="title" type="text" placeholder="Title" required="">
                                        <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                                    </div>
                                    <div class="col-lg-6 form-group mt-20">
                                        <input class="form-control" name="name" type="text" placeholder="Facebook-Link" required="">
                                        <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                                    </div>
                                    <div class="col-lg-6 form-group mt-20">
                                        <input class="form-control" name="date" type="date" placeholder="Date" required="">
                                        <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                                    </div>
                                    <div class="col-lg-6 form-group mt-20">
                                        <input class="form-control" name="text" type="text" placeholder="Decription" required="">
                                        <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                                    </div>
                                    <div class="col-lg-6 form-group mt-20">
                                        <input class="form-control" type="file" name="image" accept="image/*" required="">
                                        <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                                    </div>
                                    <div class="col-lg-6 form-group mt-20">
                                        <input type="submit" value="Upload" class="btn d-none d-lg-block btn-primary shadow border-0 rounded-2">
                                        <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Gallery Data</h4>
                                    <table class="table table-responsive-sm ">
                                        <tr>
                                            <th style="width: 60px;">Date</th>
                                            <th style="width: 60px;">Photo</th>
                                            <th style="width: 60px;">Title</th>
                                            <th style="width: 60px;">URL</th>
                                            <th style="width:60px;">Decription</th>
                                            <th style="width: 60px;">Delete</th>
                                            <th style="width: 60px;">Edit</th>
                                        </tr>
                                        <?php foreach ($images as $index => $img): ?>
                                            <tr>
                                                <td style="width: 60px;"><?= htmlspecialchars($img['date']) ?></td>
                                                <td style="width: 60px;"><img src="uploads/<?= htmlspecialchars($img['filename']) ?>"></td>
                                                <td style="width: 60px;"><?= htmlspecialchars($img['title']) ?></td>
                                                <td style="width: 60px;"><?= htmlspecialchars($img['name']) ?></td>
                                                <td style="width: 60px;"><?= htmlspecialchars($img['text']) ?></td>
                                                <td>
                                                    <form action="delete.php" method="post" onsubmit="return confirm('Delete this image?');">
                                                        <input type="hidden" name="index" value="<?= $index ?>">
                                                        <button type="submit" value="Delete"> <i class="fa-solid fa-trash-can" style="color:brown"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="edit.php" method="get">
                                                        <input type="hidden" name="index" value="<?= $index ?>">
                                                        <button type="submit" value="Edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
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