<?php
include ("../conect_database.php");


?>

<?php 
if(isset($_POST['btn_delete'])){
$delete=$conn->prepare(" DELETE FROM courses where ID=$_POST[id]");
$delete->execute();
if($delete){
    echo $_POST["file"];
    unlink("upload/".$_POST['image']);

    header('location:/E-learningSystem/backend/admin/course.php');

}}
?>