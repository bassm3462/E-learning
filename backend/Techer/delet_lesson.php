<?php 
include "conect_database.php";

?>

<?php 
if(isset($_POST['btn_delete'])){
$delete=$conn->prepare(" DELETE FROM lessons where lesson_id=$_POST[id]");
$delete->execute();
if($delete){
    echo $_POST["file"];
    unlink("Upload/".$_POST['file']);

    header('location:/E-learningSystem/backend/Techer/admin.php');

}}
?>
