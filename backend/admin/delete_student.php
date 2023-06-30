<?php

include ("../conect_database.php");
function delet_student($conn){
if (isset($_GET["id"])) {
    $id= filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
    $delete=$conn->prepare("DELETE FROM user_form WHERE ID=$id");
    $delete->execute();
}
header('location:/E-learningSystem/backend/admin/mangement_users.php');
      
        exit();
}
delet_student($conn);

?>