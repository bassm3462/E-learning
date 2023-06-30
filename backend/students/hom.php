
<?php

?>
<?php 
include ("SIDBAR.php");
include_once("conect_database.php");
include ("../Config.php");
// include_once "header.php";

?>
<?php
    
    $dsiplay=$conn->prepare("SELECT *FROM courses");
$dsiplay->execute();
?>
<div class="home_content containr">
    <div class="articles" id="articles">
        <h2 class="main-title"> courses</h2>
        <div class="container"> <?php
         if ($dsiplay->rowCount()>0) {
           foreach($dsiplay as $value){
                            ?>
            <div class="box">
                <img src="../admin/upload/<?= $value["image"]; ?>" alt="" height="200px" />
                <div class="content">
                    <h3><?=$value["name"]?></h3>
                    <p><?=$value["category"]?></p>
                </div>
                <?php
$id=encryptor('encrypt',$value["id"]); 
// $_SESSION['course_id']=$value['id']

                ;
                ?>
                <div class="information">
                    <a href="lesson.php?id=<?php echo $id ?>">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <?php
        }
      }
      else{
        echo "<div>NO COURSES</div>";
      }
      ?>
            <div class="spikes"></div>
        </div>
    </div>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</div>
</div>
</div>
<script src="../../js/bootstrap.bundle.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/bootstrap.esm.js.map"></script>
<script src="../js/bootstrap.esm.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../../frontend/js/student.js"></script>

</body>

</html>

