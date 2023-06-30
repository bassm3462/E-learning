<?php include_once ("header.php");
include_once("conect_database.php");
include "nav.php";
?>
<?php
// $course_id=$_GET["id"];
$dsiplay=$conn->prepare("SELECT*FROM assignment WHERE course_id=$_GET[id]");
$dsiplay->execute();
if ($dsiplay->rowCount()>0) {
foreach($dsiplay as $value){
?>
<section class=" ">
<div class=" container header_assign ">
<div class ="title_assign"><h3>this assignment <?php echo $value['name_ASSINMINT'] ?></h3> </div>
<div> <a href="assignment_det.php?id=<?php echo $value['ID']?>&& teacher_id=<?php echo $value['teacher_id']?>"><?php echo $value['file']?></a></div>
</div>
</section>
<?php }}
else{
?>
<div class="container">
    <div class="no_assignment">
        <h1> There is no assignment</h1>
</div>
</div>
<?php
}
?>
</body>
</html>