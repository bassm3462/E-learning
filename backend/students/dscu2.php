<?php


include "conect_database.php";
include "header.php";
?>
<?php
if(isset($_POST["reply"])){
//     $teacher = $conn->prepare("SELECT * FROM user_form WHERE ID=$_GET[teacher_id]");
// $teacher->execute();
// $row = $teacher->fetch(PDO::FETCH_ASSOC);

    date_default_timezone_set("Asia/Baghdad");
    $text=filter_var($_POST["text"],FILTER_SANITIZE_STRING);
    $time_insert=date('Y-m-d-h:i:sa');
    $insert=$conn->prepare("INSERT INTO replay_message (ID_replay,text_replay ,time_insert,student_id,teacher_id )VALUE(:ID_replay,:text_replay ,:time_insert ,:student_id,:teacher_id)");
    $insert->bindParam(":text_replay", $text);
    $insert->bindParam(":ID_replay",$_GET['id']);
    $insert->bindParam(":time_insert",$time_insert);
    $insert->bindParam(":teacher_id",$_GET['teacher_id']);
    $insert->bindParam(":student_id",$_SESSION['student_id']);
    $insert->execute();
    if($insert){
        header('location:/E-learningSystem/backend/students/discussion.php');
    }
    else{
        echo"valed";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../frontend/Style/Score.css">
</head>
<body>
<section class="information_box">
    <div id="" class=" box_info container">
        <form method="post" action="">
            <label for="text">insert text </label>
            <textarea class="form-control form-control-lg" id="text" name="text" rows="4" cols="50">
        </textarea>
            <button type="submit" name="reply" class="btn btn-primary">save</button>
        </form>
    </div>
</section>