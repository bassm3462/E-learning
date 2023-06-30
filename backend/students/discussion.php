<?php 
include "conect_database.php";
include "header.php";
include("../Config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../frontend/Style/dscussion.css">

</head>
<body>
<section class="information_box_message">
    <?php
    $id=encryptor("decrypt" ,$_GET['id']);
    $show_message_student = $conn->prepare("SELECT *FROM descussion WHERE  teacher_id=$id AND student_id = $_SESSION[student_id]");
    $show_message_student->execute();
    if($show_message_student->rowCount()>0){
    foreach ($show_message_student as $row){ ?>
    <div class="container po_meassge">
    <div class="dsiplay_message ">
        <div><p><?php echo $row['text'] ?></p></div>
       <div> 
        <a href="dscu2.php? id=<?php echo $row['ID']?>&teacher_id=<?php echo $row['teacher_id']?>">Reply</a>

    </div>
   
    </div>
    <?php 
     $show_message_reply = $conn->prepare("SELECT *FROM replay_message WHERE  ID_replay= $row[ID]");
     $show_message_reply->execute();
    foreach($show_message_reply as $reply){ ?>
    <div class="reply_meassg">
<p class=""><?php 
 echo $reply['text_replay']?></p>
 <a href="delete_maessgg.php?id=<?php echo $reply['replay_id'] ?>"><i class="fa-solid fa-trash-can btn" ></i></a>
 </div>
 
<?php }?>
    </div>
    <?php }}else{
echo" h1 no message</h1>";

    }?>
</section>
</body>
</html>