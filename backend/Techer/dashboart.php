<?php include "nvigation_tech.php" ?>


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
include("conect_database.php");
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


<?php include("../admin/footer.php") ?>