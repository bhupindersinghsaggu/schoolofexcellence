
<?php
$uploadDir = 'uploads/';

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $fileName = basename($_FILES['photo']['name']);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
        echo "Photo uploaded successfully.";
    } else {
        echo "Error uploading photo.";
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $fileToDelete = $uploadDir . basename($_GET['delete']);
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        echo "Photo deleted.";
    }
}

// Get all photos
$photos = array_diff(scandir($uploadDir), ['.', '..']);
?>
<?php include('../schoolofexcellence/web/header.php')?>;
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Photo Gallery</title>
</head>
<body>
    <h2>Upload Photo</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo" required>
        <button type="submit">Upload</button>
    </form>

    <h2>Uploaded Photos</h2>
    <?php foreach ($photos as $photo): ?>
        <div style="margin: 10px; display:inline-block;">
            <img src="uploads/<?php echo $photo; ?>" width="150"><br>
            <a href="?delete=<?php echo $photo; ?>" onclick="return confirm('Are you sure you want to delete this photo?');">Delete</a>
        </div>
    <?php endforeach; ?>

    
   <div class="dashbaord-promo position-relative"></div>
   <!-- Dashboard Cover Start -->
   <div class="dashbaord-cover bg-shade sec-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 position-relative">
               <div class="dash-cover-bg rounded-3" style="background-image: url('images/student_bg.jpg');"></div>
               <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
                  <div class="ava-wrap d-flex align-items-center">
                     <div class="avatar me-3 rounded-circle"><img width="150" src="images/avatar.png"
                           class="rounded-circle" alt="Avatar"></div>
                     <div class="ava-info">
                        <h4 class="display-5 text-white mb-0">Maria Carey Mc.</h4>
                        <div class="ava-meta text-white mt-1">
                           <span><img width="20" src="images/icons/star.png" alt="">4.8 </span>
                           <span><i class="feather-icon icon-users"></i>25k Students </span>
                        </div>
                     </div>
                  </div>
                  <a href="instructor-create-course.html" class="btn btn-sm btn-info rounded-5"><i
                     class="feather-icon icon-plus me-2"></i>Add New
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
                           <li><a class="nav-link" href="instructor-dashboard.html"><i
                                    class="feather-icon icon-home"></i><span>Dashboard</span></a></li>
                           <li><a class="nav-link" href="instructor-profile.html"><i
                                    class="feather-icon icon-user"></i><span>My
                                    Profile</span></a></li>
                           <li><a class="nav-link" href="instructor-enrolled-courses.html"><i
                                    class="feather-icon icon-book-open"></i><span>Enrolled
                                    Courses</span></a>
                           </li>
                           <li><a class="nav-link" href="instructor-wishlist.html"><i
                                    class="feather-icon icon-gift"></i><span>Wishlist</span></a></li>

                           <li><a class="nav-link" href="instructor-reviews.html"><i
                                    class="feather-icon icon-star"></i><span>Reviews</span></a>
                           </li>

                           <li><a class="nav-link" href="instructor-my-quiz-attempts.html"><i
                                    class="feather-icon icon-box"></i><span>My
                                    Quiz Attempts</span></a>
                           </li>
                           <li><a class="nav-link" href="instructor-order-history.html"><i
                                    class="feather-icon icon-shopping-bag"></i><span>Order
                                    History</span></a></li>
                        </ul>
                     </nav>
                  </div>
                  <div class="widget">
                     <p class="grettings">instructor</p>
                     <nav class="dashboard-nav">
                        <ul class="list-unstyled nav">
                           <li><a class="nav-link" href="instructor-courses.html"><i
                                    class="feather-icon icon-book"></i><span>My
                                    Courses</span></a></li>
                           <li><a class="nav-link" href="instructor-assignments.html"><i
                                    class="feather-icon icon-briefcase"></i><span>Assignments</span></a></li>
                           <li><a class="nav-link" href="instructor-quiz-attemps.html"><i
                                    class="feather-icon icon-cpu"></i><span>Quiz
                                    Attempts</span></a>
                           </li>
                           <li><a class="nav-link" href="instructor-announcements.html"><i
                                    class="feather-icon icon-bell"></i><span>Announcements</span></a>
                           </li>

                        </ul>
                     </nav>
                  </div><!--  Widget End -->
                  <div class="widget">
                     <p class="grettings">User</p>
                     <nav class="dashboard-nav">
                        <ul class="list-unstyled nav">
                           <li><a class="nav-link active" href="instructor-settings.html"><i
                                    class="feather-icon icon-settings"></i><span>Settings</span></a></li>
                           <li><a class="nav-link" href="index.html"><i
                                    class="feather-icon icon-log-out"></i><span>Logout</span></a>
                           </li>
                        </ul>
                     </nav>
                  </div><!--  Widget End -->
               </aside>
            </div>
            <div class="col-lg-9 ps-lg-4">
               <section class="dashboard-sec">
                  <h2 class="display-5 border-bottom pb-3 mb-4">Settings</h2>
                  <div class="course-tab">
                     <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                           <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                              data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                              aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password"
                              type="button" role="tab" aria-controls="password" aria-selected="false">Password</button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button class="nav-link" id="withdrawal-tab" data-bs-toggle="tab"
                              data-bs-target="#withdrawal" type="button" role="tab" aria-controls="withdrawal"
                              aria-selected="false">Withdrawal Account</button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social"
                              type="button" role="tab" aria-controls="social" aria-selected="false">Social
                              Share</button>
                        </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                           <div class="position-relative profile-cover-wrap">
                              <div class="profile-cover-bg rounded-3"
                                 style="background-image: url('images/student-cover.jpg');"></div>
                              <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
                                 <div class="ava-wrap position-relative horizontal-field">
                                    <div class="avatar me-3 rounded-circle"><img width="120" src="images/avatar.png"
                                          class="rounded-circle" alt="Avatar"></div>
                                    <a href="#" class="icon-xs rounded-5 bg-info">
                                       <div class="feather-icon icon-camera"></div>
                                    </a>

                                 </div>
                                 <a href="#" class="btn btn-sm btn-info rounded-5"><i
                                       class="feather-icon icon-camera me-2"></i>Edit Cover Photo</a>
                              </div>
                           </div>
                           <form action="#" class="profile-form mt-5">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="firstname">First Name</label>
                                       <input id="firstname" type="text" value="John">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="lastname">Last Name</label>
                                       <input id="lastname" type="text" value="Due">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="username">User Name</label>
                                       <input id="username" type="text" value="johndue">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="phonenumber">Phone Number</label>
                                       <input id="phonenumber" type="tel" value="+27-022-292-182">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="skill">Skill/Occupation</label>
                                       <input id="skill" type="text" value="Full Stack Developer">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="displayname">Display Name Publicly As</label>
                                       <select class="w-100" id="select" name="displayname">
                                          <option value="JosefaDoe">Josefa Doe</option>
                                          <option value="John">John</option>
                                          <option value="rao">Robin Rao</option>
                                          <option value="Due John">Due John</option>
                                          <option value="jona">Jonathon</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="bio">Bio</label>
                                 <textarea id="bio"
                                    rows="8">My name is Tariq, and I am a seasoned Front End and WordPress Developer with extensive experience since 2015. I possess a diverse skill set that includes proficiency in WordPress, HTML, CSS, Sass, Bootstrap, React, JavaScript, jQuery, PHP, WooCommerce, and Photoshop.</textarea>
                              </div>
                              <button type="submit" class="btn btn-sm btn-primary mt-3">Update Info</button>
                           </form>
                        </div> <!-- Tab Pane End -->
                        <div class="tab-pane fade" id="password" role="tabpanel">
                           <form action="#" class="profile-form mt-5">
                              <div class="form-group">
                                 <label for="c-password">Current Password</label>
                                 <input id="c-password" type="password" placeholder="current password">
                              </div>
                              <div class="form-group">
                                 <label for="n-password">New Password</label>
                                 <input id="n-password" type="password" placeholder="New password">
                              </div>
                              <div class="form-group">
                                 <label for="c1-password">Confirm Password</label>
                                 <input id="c1-password" type="password" placeholder="Confirm password">
                              </div>
                              <div class="submit-btn mt-25">
                                 <button type="submit" class="btn btn-sm btn-primary mt-3">Update Password</button>
                              </div>
                           </form>
                        </div> <!-- Tab Pane End -->
                        <div class="tab-pane fade" id="withdrawal" role="tabpanel">
                           <form action="#" class="profile-form mt-5">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="account">Account Number</label>
                                       <input id="account" type="number" placeholder="Account Number">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="account-name">Account Name</label>
                                       <input id="account-name" type="text" placeholder="Account Name">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="bank">Bank Name</label>
                                       <input id="bank" type="text" placeholder="Bank Name">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="routing">Routing Number</label>
                                       <input id="routing" type="number" placeholder="Routing Number">
                                    </div>
                                 </div>


                              </div>
                              <div class="submit-btn mt-25">
                                 <button type="submit" class="btn btn-sm btn-primary mt-3">Update Password</button>
                              </div>
                           </form>
                        </div> <!-- Tab Pane End -->
                        <div class="tab-pane fade" id="social" role="tabpanel">
                           <form action="#" class="profile-form mt-5">
                              <div class="form-group horizontal-field">
                                 <label for="facebook">Facebook</label>
                                 <input id="facebook" type="text" placeholder="https://facebook.com/">
                              </div>
                              <div class="form-group horizontal-field">
                                 <label for="twitter">Twitter</label>
                                 <input id="twitter" type="text" placeholder="https://twitter.com/">
                              </div>
                              <div class="form-group horizontal-field">
                                 <label for="linkedin"> Linkedin</label>
                                 <input id="linkedin" type="text" placeholder="https://linkedin.com/">
                              </div>
                              <div class="form-group horizontal-field">
                                 <label for="dribble"> Dribble</label>
                                 <input id="dribble" type="text" placeholder="https://dribble.com/">
                              </div>
                              <div class="form-group horizontal-field">
                                 <label for="website"> Website</label>
                                 <input id="website" type="text" placeholder="https://website.com/">
                              </div>
                              <div class="form-group horizontal-field">
                                 <label for="github"> Github</label>
                                 <input id="github" type="text" placeholder="https://github.com/">
                              </div>
                              <button class="btn btn-sm btn-primary mt-3">Update Profile</button>
                           </form>
                        </div> <!-- Tab Pane End -->
                     </div>
               </section>
            </div>
         </div>
      </div>
   </div>
   <!-- Dashboard Cover End -->
   <?php include('../schoolofexcellence/web/header.php')?>;
</body>
</html>
