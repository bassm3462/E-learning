
<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css  -->
    <link rel="stylesheet" href="../../frontend/Style/bootstrap-grid.rtl.min.css">
    <link rel="stylesheet" href="../../frontend/Style/all.min.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap-theme.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap.min.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap-utilities.rtl.min.css">
    <link rel="stylesheet" href="../../frontend/Style/Globle.css">
    <link rel="stylesheet" href="../../frontend/Style/admin.css">
    <link rel="stylesheet" href="../../frontend/Style/normalize.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../frontend/Style/create.css"> -->
    <!-- <link rel="stylesheet" href="../../frontend/Style/header.css"> -->
    <!-- <link rel="stylesheet" href="../../frontend/Style/login.css"> -->
    <link rel="stylesheet" href="../../frontend/Style/Lessons1.css">
    <link rel="stylesheet" href="../../frontend/Style/student.css">
    <link rel="stylesheet" href="../../frontend/Style/Dscussion.css">
    <link rel="stylesheet" href="../../frontend/Style/Assignmeant.css">

    

<?php
$student_id = $_SESSION['student_id'];
if(!isset($student_id)){
   header('location:/MyProject2/backend/index.php');
}
?>
    <!-- end css -->

