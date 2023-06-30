<?php

include ("../conect_database.php");
function delet_teacher($conn){
if (isset($_GET["id"])) {
    $id= filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
    $delete=$conn->prepare("DELETE FROM user_form WHERE ID=$id");
    $delete->execute();
}
header('location:/E-learningSystem/backend/admin/mange_teacher.php');
      
        exit();
}
delet_teacher($conn);

?>