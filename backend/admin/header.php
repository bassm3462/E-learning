
<?php 
// session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../frontend/Style/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../frontend/Style/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
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
    <link rel="stylesheet" href="../../frontend/Style/create.css">
    <link rel="stylesheet" href="../../frontend/Style/header.css">
    <link rel="stylesheet" href="../../frontend/Style/login.css">
    <link rel="stylesheet" href="../../frontend/Style/admin.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
         integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<?php
    include ("../conect_database.php");


    // $admin_id = $_SESSION['admin_id'];
    // $teacher_name=$_SESSION['teacher_name'];

    // if (!isset($admin_id)) {
    //     header('location:/MyProject2/backend/index.php');
    // }

    ?>