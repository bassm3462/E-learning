<?php include "nav.php" ?>


<!-- HOME -->
<section id="home">
     <div class="row">

          <div class="owl-carousel owl-theme home-slider">
               <div class="item item-first">
                    <div class="caption">
                         <div class="container">
                              <div class="col-md-6 col-sm-12">
                                   <h1>Distance Learning Education Center</h1>
                                   <h3>Our online courses are designed to fit in your industry supporting all-round with latest technologies.</h3>
                                   <a href="#feature" class="section-btn btn btn-default smoothScroll">Discover more</a>
                              </div>
                         </div>
                    </div>
               </div>

               <div class="item item-second">
                    <div class="caption">
                         <div class="container">
                              <div class="col-md-6 col-sm-12">
                                   <h1>Start your journey with our practical courses</h1>
                                   <h3>Our online courses are built in partnership with technology leaders and are designed to meet industry demands.</h3>
                                   <a href="#courses" class="section-btn btn btn-default smoothScroll">Take a course</a>
                              </div>
                         </div>
                    </div>
               </div>

               <div class="item item-third">
                    <div class="caption">
                         <div class="container">
                              <div class="col-md-6 col-sm-12">
                                   <h1>Efficient Learning Methods</h1>
                                   <h3>Nam eget sapien vel nibh euismod vulputate in vel nibh. Quisque eu ex eu urna venenatis sollicitudin ut at libero. Visit <a href="https://plus.google.com/+templatemo" target="_parent">templatemo</a> page.</h3>
                                   <a href="#contact" class="section-btn btn btn-default smoothScroll">Let's chat</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>
<?php
$queryNumberTeacher = $conn->prepare("SELECT COUNT(*) FROM user_form WHERE user_type='teacher'");
$queryNumberTeacher->execute();

?>
<?php
$queryNumberStudent = $conn->prepare("SELECT COUNT(*) FROM user_form WHERE user_type='student'");
$queryNumberStudent->execute();

?><?php
     $queryNumberCourses = $conn->prepare("SELECT COUNT(*) FROM courses");
     $queryNumberCourses->execute();

     ?>

<!-- FEATURE -->
<section id="feature">
     <div class="container">
          <div class="row">

               <div class="col-md-4 col-sm-4">
                    <div class="feature-thumb">
                         <span>0<?php print_r($queryNumberCourses->fetchColumn()); ?></span>
                         <h3>Trending Courses</h3>
                         <p>The courses in this educational program are free and new courses can be added to increase the students ' experience</p>
                    </div>
               </div>

               <div class="col-md-4 col-sm-4">
                    <div class="feature-thumb">
                         <span>0<?php print_r($queryNumberStudent->fetchColumn()); ?></span>
                         <h3>Students</h3>
                         <p>The number of students who are in this educational program regardless of the course</p>
                    </div>
               </div>

               <div class="col-md-4 col-sm-4">
                    <div class="feature-thumb">
                         <span>0<?php print_r($queryNumberTeacher->fetchColumn()); ?></span>
                         <h3>Certified Teachers</h3>
                         <p>The number of teachers participating in this educational program to teach students based on courses</p>
                    </div>
               </div>

          </div>
     </div>
</section>

<?php include("../conect_database.php");
// include "header.php";

$teacher = $conn->prepare("SELECT * FROM user_form WHERE user_type='teacher'");
$teacher->execute();
?>
<section id="team">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                         <h2>Teachers <small>Meet Professional Trainers</small></h2>
                    </div>
               </div>
               <?php
               if ($teacher->rowCount() > 0) {
                    foreach ($teacher as $row) {
               ?>
                         <div class="col-md-3 col-sm-6">
                              <div class="team-thumb">
                                   <div class="team-image">
                                        <img src="../uploaded_img/<?php echo $row["image"]; ?>" class="img-responsive" alt="">
                                   </div>
                                   <div class="team-info">
                                        <h3><?php echo $row['name'] ?></h3>
                                        <span>I love Teaching</span>
                                   </div>
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-instagram"></a></li>
                                   </ul>
                              </div>
                         </div>
               <?php }
               } ?>

          </div>
     </div>
</section>

<?php

$dsiplay = $conn->prepare("SELECT *FROM courses");
$dsiplay->execute();
?>
<!-- Courses -->
<section id="courses">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                         <h2>Popular Courses <small>Upgrade your skills with newest courses</small></h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-courses">
                         <?php if ($dsiplay->rowCount() > 0) {
                              foreach ($dsiplay as $value) {
                         ?>
                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                             <div class="courses-thumb">
                                                  <div class="courses-top">
                                                       <div class="courses-image">
                                                            <img src="../admin/upload/<?= $value["image"]; ?>" class="img-responsive" id="height_image" alt="" height="250px">
                                                       </div>
                                                       <div class="courses-date">
                                                            <span><i class="fa fa-calendar"></i><?= $value["date"] ?></span>
                                                            <span><i class="fa fa-clock-o"></i><?= $value["duration"] ?></span>
                                                       </div>
                                                  </div>

                                                  <div class="courses-detail">
                                                       <h3><a href="#"><?= $value["name"] ?></a></h3>
                                                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                  </div>

                                                  <!-- <div class="courses-info">
                                                       <div class="courses-author">
                                                            <img src="images/author-image1.jpg" class="img-responsive" alt="">
                                                            <span>Mark Wilson</span>
                                                       </div>
                                                  <div class="courses-price">
                                                            <a href="#"><span>USD 25</span></a>
                                                       </div> 
                                                  </div> -->
                                             </div>
                                        </div>
                                   </div>
                         <?php }
                         }
                         // echo "no course";
                         ?>


                    </div>

               </div>
          </div>
</section>
<?php
$student = $conn->prepare("SELECT * FROM user_form WHERE user_type='student'");
$student->execute();
?>

<!-- TESTIMONIAL -->
<section id="testimonial">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                         <h2>Student Reviews <small>from around the world</small></h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-client">
                         <?php
                         if ($student->rowCount() > 0) {
                              foreach ($student as $row) {
                         ?>
                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                             <div class="tst-image">
                                                  <img src="../uploaded_img/<?php echo $row["image"]; ?>" class="img-responsive" alt="">
                                             </div>
                                             <div class="tst-author">
                                                  <h4><?php echo $row['name'] ?></h4>
                                                  <span>Shopify Developer</span>
                                             </div>
                                             <p>You really do help young creative minds to get quality education and professional job search assistance. I’d recommend it to everyone!</p>
                                             <div class="tst-rating">
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                             </div>
                                        </div>
                                   </div>
                         <?php }
                         } ?>

                    </div>

               </div>
          </div>
</section>

<?php include "footer.php"; ?>