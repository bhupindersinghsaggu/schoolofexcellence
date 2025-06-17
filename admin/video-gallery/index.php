<?php include('header.php') ?>
<?php include('..//../web/css.php') ?>



<div class="dashbaord-cover bg-shade sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 position-relative">
                <div class="dash-cover-bg rounded-3" style="background-image: url('images/student_bg.jpg');"></div>
                <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
                </div>
            </div>
        </div>
        <!-- Dashboard Inner Start -->
        <div class="row mt-5">
            <div class="col-lg-3">
                <?php include('../aside.php') ?>
            </div>
            <div class="col-lg-9 ps-lg-4">
                <section class="dashboard-sec">
                    <h2><?= $editItem ? 'Update Video' : 'Upload New YouTube Video' ?></h2>
                    <form class="video-form" action="upload.php" method="POST">

                        <div class="col-lg-6 form-group mt-20">
                            <input type="hidden" name="index" value="<?= $editIndex !== null ? $editIndex : '' ?>">
                        </div>
                        <div class="col-lg-6 form-group mt-20">
                            <input type="text" name="title" placeholder="Video Title" required value="<?= $editItem['title'] ?? '' ?>">
                        </div>
                        <div class="col-lg-6 form-group mt-20">
                            <input type="text" name="name" placeholder="Uploaded By" required value="<?= $editItem['name'] ?? '' ?>">
                        </div>
                        <div class="col-lg-6 form-group mt-20">
                            <input type="date" name="date" required value="<?= $editItem['date'] ?? '' ?>">
                        </div>
                        <div class="col-lg-6 form-group mt-20">
                            <input type="url" name="youtube" placeholder="YouTube Video Link" required value="<?= isset($editItem['youtube_id']) ? 'https://www.youtube.com/watch?v=' . $editItem['youtube_id'] : '' ?>"><br><br>
                        </div>
                        <div class="col-lg-6 form-group mt-20">
                            <button class="btn d-none d-lg-block btn-primary shadow border-0 rounded-2" type="submit"><?= $editItem ? 'Update Video' : 'Add Video' ?></button>
                        </div>
                    </form>
                    <h4>Uploaded Video</h4>
                    <table class="table table-responsive-sm ">
                        <tr>
                            <th style="width: 60px;">Title</th>
                            <th style="width: 60px;">Thumbnail</th>
                            <th style="width: 60px;">Uploaded By</th>
                            <th style="width: 60px;">Date</th>
                            <!-- <th style="width:60px;">Decription</th> -->
                            <th style="width: 60px;">Delete</th>

                        </tr>
                        <?php foreach (array_reverse($data) as $i => $item): ?>
                            <tr>
                                <td style="width: 60px;"><?= htmlspecialchars($item['title'] ?? '') ?></td>
                                <td style="width: 60px;"><img class="thumbnail" src="<?= htmlspecialchars($item['thumbnail'] ?? '') ?>" alt="Thumbnail" onclick="openModal('<?= $item['youtube_id'] ?? '' ?>')"></td>
                                <td style="width: 60px;"><?= htmlspecialchars($item['name']) ?></td>
                                <td style="width: 60px;"><?= htmlspecialchars($item['date']) ?></td>

                                <td>
                                    <form action="delete.php" method="post" onsubmit="return confirm('Delete this image?');">
                                        <input type="hidden" name="index" value="<?= $index ?>">
                                        <button type="submit" value="Delete"> <i class="fa-solid fa-trash-can" style="color:brown"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <div id="modal" style="display:none; position:fixed; top:10%; left:10%; width:80%; height:80%; background:rgba(0,0,0,0.8);">
                        <span onclick="closeModal()" style="position:absolute; top:10px; right:20px; font-size:24px; color:white; cursor:pointer;">×</span>
                        <iframe id="modalVideo" src="" style="width:100%; height:100%;" frameborder="0" allowfullscreen></iframe>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php include('..//../web/scripts.php') ?>

<script>
function openModal(videoId) {
    document.getElementById('modal').style.display = 'block';
    document.getElementById('modalVideo').src = 'https://www.youtube.com/embed/' + videoId;
}
function closeModal() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('modalVideo').src = '';
}
</script>
