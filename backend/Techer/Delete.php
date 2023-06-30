<?php

include "conect_database.php";
function delet_lessons($conn){
if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $delete=$conn->prepare("DELETE FROM lessons WHERE lesson_id=$id");
    $delete->execute();
}
        header('location:/E-learningSystem/backend/Techer/admin.php');
        exit();
}
function delet_Assigment($conn){
    if (isset($_GET["id"])) {
        $id=$_GET["id"];
        $delete=$conn->prepare("DELETE FROM assignment WHERE ID=$id");
        $delete->execute();
    }
            header('location:/E-learningSystem/backend/Techer/Assignment.php');
            exit();
    }
    function delet_QUZE($conn){
        if (isset($_GET["id"])) {
            $id=$_GET["id"];
            $delete=$conn->prepare("DELETE FROM quize WHERE ID=$id");
            $delete->execute();
        }
                header('location:/E-learningSystem/backend/Techer/Quize.php');
                exit();
        }
?>