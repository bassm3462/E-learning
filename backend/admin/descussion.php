<?php
include ("header.php");
include ("../conect_database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       $dsiplay=$conn->prepare("SELECT*FROM courses");
      $dsiplay->execute();
      ?>
    

<div class="groub_course">
<ul class="list-group">
   
  <li class="list-group-item active" aria-current="true">An active courses</li>
   <?php
  if ($dsiplay->rowCount()>0) {
        foreach($dsiplay as $value){
    ?>
  <li class="list-group-item"><a href="dscu2.php?id=<?=$value['id'] ?>"><?php echo $value['name']?></a></li>
  <?php
  }
}
  ?>
</ul>
</div>


<?php
        
// include "footer.php"
?>