<?php
include ("header.php");
include("conect_database.php");

?>
<?php

// $student_id=urlencode($_GET["id"]);
// $student=$conn->prepare("SELECT * FROM user_form WHERE user_type='student'");
// $student->execute();

?>
<div class="file">
      <?php if($student->rowCount()>0){
    foreach($student as $row){
        ?>
    <div class="dsiplay_user ">
      
      <div class ="user">
    <img src="../uploaded_img/<?php echo $row["image"]?>" alt="" srcset="" class="img_user">
<h3><?php echo $row["name"]?></h3>
</div>
<ul>
    <li><i class="fa-solid fa-message btn btn-info"></i></i></li>
</ul>

</div>
<?php
    }}
?>
</div>

<?php

?>