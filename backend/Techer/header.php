<?php
session_start();
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- css  -->
    <link rel="stylesheet" href="../../frontend/Style/bootstrap-grid.rtl.min.css">
    <link rel="stylesheet" href="../../frontend/Style/all.min.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap-grid.min.css">

    <link rel="stylesheet" href="../../frontend/Style/bootstrap-theme.css">

    <link rel="stylesheet" href="../../frontend/Style/bootstrap.min.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap-utilities.rtl.min.css">
    <link rel="stylesheet" href="../../frontend/Style/Globle.css">
    <link rel="stylesheet" href="../../frontend/Style/normalize.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../frontend/Style/create.css"> -->
    <link rel="stylesheet" href="../../frontend/Style/header.css">
    <link rel="stylesheet" href="../../frontend/Style/login.css">
    <link rel="stylesheet" href="../../frontend/Style/teacher.css">
    <link rel="stylesheet" href="../../frontend/Style/dscussion.css">
    <!-- <link rel="stylesheet" href="../../frontend/Style/Score.css"> -->
    <link rel="stylesheet" href="../../frontend/Style/lessons1.css">
    




    <!-- end css -->
    <?php
    include "conect_database.php";


    $teacher_id = $_SESSION['teacher_id'];
    // $teacher_name=$_SESSION['teacher_name'];

    if (!isset($teacher_id)) {
        header('location:/E-learningSystem/backend/index.php');
    }

    ?>