<?php include_once ("header.php");
include_once("conect_database.php");
include "nav.php";
?>
<div class="container" style="margin-top:10px;" >
<a href="quize_multiply.php?id=<?php echo $_GET['id']?>"class="btn btn-light">Quiz multiple choice</a></div>
<?php
// $course_id=$_GET["id"];
$dsiplay=$conn->prepare("SELECT*FROM quize WHERE course_id=$_GET[id]");
$dsiplay->execute();
foreach($dsiplay as $value){
?>
<section class=" ">
<div class=" container header_assign ">
    <a href="quizzs.php?id=<?php echo $value['teacher_id'] ?>"></a>
<div class ="title_assign"><h3>Quiz <?php echo $value['name_quize'] ?></h3> </div>
<div> <a href="quize.php?id=<?php echo $value['ID']?>&& teacher_id=<?php echo $value['teacher_id']?>"><?php echo $value['file']?></a></div>

</div>

</section>
<?php } ?>
</body>
</html>