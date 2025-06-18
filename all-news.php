<?php include('web/header.php'); ?>


<section class="promo-sec" style="background: url('images/promo-bg.jpg')no-repeat center center / cover;">
    <img src="images/promo-left.png" alt="" class="anim-img">
    <img src="images/promo-right.png" alt="" class="anim-img anim-right">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-2 text-white">Photo Gallery</h1>
            </div>
        </div>
    </div>
</section>
<section class="blog-sec bg-shade sec-padding">
    <div class="container">
        <div class="row">
         <?php include './admin/photo-admin/db.php'; ?>
            <?php
            $res = $conn->query("SELECT * FROM photos ORDER BY id DESC");
            while ($row = $res->fetch_assoc()):
            ?>
                <div class="col-xl-4 col-md-6">
                    <div class="event-entry shadow-sm overflow-hidden rounded-4">
                        <div class="event-thumb">
                            <img class="card-img-top" src="admin/photo-admin/uploads//<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                            <div class="entry-content p-4">
                                <div class="event-meta d-flex justify-content-between mb-2">
                                    <span><i class="feather-icon icon-calendar"></i> <?= $row['upload_date'] ?></span>
                                </div>
                                <h3 class="display-5">
                                    <a href=" target=" _blank"><?= htmlspecialchars($row['title']) ?>
                                    </a>
                                </h3>
                                <?php if ($row['url']): ?>
                                    <a class="btn btn-outline-primary rounded-5" href="<?= htmlspecialchars($row['url']) ?>" target="_blank">More Info</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php include('web/footer.php'); ?>