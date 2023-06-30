<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- end link icon -->
    <link rel="stylesheet" href="../../frontend/Style/Globle.css">
    <link rel="stylesheet" href="../../frontend/Style/Student.css">
    <!-- css  -->
    <?php include_once "header.php";
     include_once "conect_database.php";
     include("../Config.php");
     ?>
    <title>student</title>
</head>
<?php
      $select_profile = $conn->prepare("SELECT * FROM `user_form` WHERE ID = :id");
      $select_profile->bindParam("id",$student_id);
      $select_profile->execute();
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>

<body>
    <?php 
    if(isset($_GET['id'])&&!empty($_GET['id'])){
        // echo $_GET['id'];=
        $id=encryptor('decrypt',$_GET['id']);
$dsiplay_course_id=$conn->prepare("SELECT *FROM courses WHERE id=:id");
$dsiplay_course_id->bindParam(":id",$id);
$dsiplay_course_id->execute();
$select = $dsiplay_course_id->fetch(PDO::FETCH_ASSOC);
//  foreach($dsiplay_course_id as $select){
// if($select->rowCount() > 0){
        ?>  
    <div class="header" id="">
        <div class="containr">
            <a href="#" class="logo">E-learning</a>
          
            <ul class="main-nav">
                
                <li><a href="hom.php" class="btn">Dashboard</a></li>
                <li><a href="lesson.php?id=<?php echo $select['id']?>" class="btn"> Modules</a></li>
                <li><a href="Assignment.php?id=<?php echo $select['id']?>" class="btn">Assignment </a></li>
                <li><a href="quiz_hom.php?id=<?php echo $select['id']?>" class="btn">Quizzes</a></li>
                <li><a href="techer_name.php?id=<?php echo $select['id']?>" class="btn">Discussions</a></li>
                <li class="prof">
                    <!-- <img class="imge_profile" src="../uploaded_img/<?=  $fetch_profile['image'];?>" alt="profile_imge"width="20px"hight="20px"> -->
                    <!-- <h3><?= $fetch_profile['name']; ?></h3> -->
                </li>
            </ul>
        </div>
    </div>
    </div>
    <?php }?>
    <?php include "footer.php";?>