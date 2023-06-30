<?php
include "conect_database.php";
session_start();
$student_id = $_SESSION['student_id'];
if (!isset($student_id)) {
    header('location:/MyProject2/backend/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../frontend/Style/Globle.css">
    <link rel="stylesheet" href="../../frontend/Style/Student.css">
    <!-- <link rel="stylesheet" href="../../frontend/Style/bootstrap.rtl.min.css"> -->
    <link rel="stylesheet" href="../../frontend/Style/all.min.css">
    <link rel="stylesheet" href="../../frontend/Style/normalize.css">
    <link rel="stylesheet" href="../../frontend/Style/bootstrap-grid.min.css">
    <title>E-Learning</title>
</head>
<?php
$select_profile = $conn->prepare("SELECT * FROM `user_form` WHERE ID = :id");
$select_profile->bindParam("id", $student_id);
$select_profile->execute();
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <header id="header">
        <h1 herf="" class="logo"><a href="">E-Learning</a></h1>
        <div class="prof">
            <img class="imge_profile" src="../uploaded_img/<?= $fetch_profile['image']; ?>" alt="profile_imge">
            <h3><?= $fetch_profile['name']; ?></h3>
        </div>
    </header>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
            <!-- <i class=" fa-solid fa-e"></i> -->
                <!-- <i class='bx bxl-c-plus-plus'></i> -->
                <img src="../../frontend/image/OQT8MQ0.jpg" alt="" srcset="" width="30">
                <div class="logo_name">E-Learning</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="../user_profile_update.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
        
            <li>
                <a href="#">
                    <i class='bx bx-folder'></i>
                    <span class="links_name">File manger</span>
                </a>
                <span class="tooltip">Files</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-folder'></i>
                    <span class="links_name">Assignmaint manger</span>
                </a>
                <span class="tooltip">Assignmaint</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-folder'></i>
                    <span class="links_name">quize</span>
                </a>
                <span class="tooltip">Saved</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <!--<img src="profile.jpg" alt="">-->
                    <div class="name_job">
                        <div class="name">Codebender</div>
                        <div class="job">Web Developer</div>
                    </div>
                </div>
                <a href="../logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </div>
        </div>
    </div>