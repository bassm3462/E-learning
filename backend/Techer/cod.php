<?php include "conect_database.php";
include "header.php";
?>
<?php 
if(isset($_POST['save_score_assgi'])){
    $score_update=$_POST['score_update'];
    $update=$conn->prepare("UPDATE score SET score_assigmaint=:score_assigmaint ");
    $update->bindParam('score_assigmaint',$score_update);
    $update->execute();
    if($update){
        header('location:/E-learningSystem/backend/Techer/sent_file_from_student.php');
    }
    else{
        echo "erooroorooroo";
    }
}

?> 
<?php
if(isset($_POST["save_message"])){
    date_default_timezone_set("Asia/Baghdad");
$select_course=filter_var($_POST["course_id"],FILTER_SANITIZE_NUMBER_INT);
$text=filter_var($_POST["text"],FILTER_SANITIZE_STRING);
$user_type=filter_var($_GET["user"],FILTER_SANITIZE_STRING);

$time_insert=date('Y-m-d-h-m-s');
$id_student=filter_var($_GET['student_id'],FILTER_SANITIZE_NUMBER_INT);
$insert=$conn->prepare("INSERT INTO descussion (course_id,text ,teacher_id ,time_insert , student_id,type_user)VALUE(:course_id  ,:text ,:teacher_id,:time_insert,:student_id,:type_user)");
$insert->bindParam(":course_id",$select_course);
$insert->bindParam(":text", $text);
$insert->bindParam(":student_id",$id_student);
$insert->bindParam(":teacher_id",$_SESSION['teacher_id']);
$insert->bindParam(":time_insert",$time_insert);
$insert->bindParam(":type_user",$_GET['user']);
$insert->execute();
if($insert){
    header('location:/E-learningSystem/backend/Techer/dscu2.php');
}
else{
    echo"valId";
}
}

?>