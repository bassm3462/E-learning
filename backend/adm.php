<?php
include ("conect_database.php");

include ("header.php");

if(isset($_POST['save'])){

$course=$_POST['cname'];
$code=$_POST['code'];

$insert=$conn->prepare("INSERT INTO course(cours_name,code)VALUE(?,?)");
if($insert->execute([$course,$code])){

    header("location:/MyProject2/backend/students/hom.php");
}
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        form{
            margin:20px;
        }
        .box{
width: 100px;
heigh:100px;
background_color: #eeeeee;
        }


        
    </style>
</head>
<body>
    <form method="post">
<input type="text" name="cname" class="">name convert
<input type="text" name ="code"class=" ">code
<button type="submit"name="save">save</button>


    </form>

    <?php
include ("conect_database.php");
$course_dsiblay=$conn->prepare("SELECT*FROM course");
$course_dsiblay->execute();
   
foreach($course_dsiblay as $row){
    $_SESSION['course_id'] = $row['id'];

     ?>
<div class ="box">
<h5><?= $row['cours_name']?></h5>
<!-- <button VALUE="<?php header('loaction:/MyProject2/backend/register.php')?>">more</button> -->
<a href="/MyProject2/backend/register.php">save</a>
</div>

<?php
   }


   

    
    ?>


</body>
</html>