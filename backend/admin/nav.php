<?php
 session_start();
//  include "header.php"; ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <!-- icon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
         integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="../../frontend/Style/Globle.css">
     <link rel="stylesheet" href="../../frontend/Style/bootstrap.min.css">
     <link rel="stylesheet" href="../../frontend/Style/font-awesome.min.css">
     <link rel="stylesheet" href="../../frontend/Style/owl.carousel.css">
     <link rel="stylesheet" href="../../frontend/Style/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../../frontend/Style/templatemo-style.css">
</head>
     <!-- css  -->
     <title>admin</title>
 </head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     <div class="header" id="">
         <div class="containr">
             <a href="#" class="logo">E-learning</a>
             <ul class="main-nav">
             <li><a href="dashboard_1.php" class="btn">Dashboard</a></li>
                 <li><a href="course.php" class="btn"> courses</a></li>
                 <li><a href="mange_teacher.php" class="btn">Management Teachers  </a></li>
                 <li><a href="mangement_users.php" class="btn">Management students</a></li> 
                 <li><a href="descussion.php" class="btn">Discussion </a></li>
                 <li><a href="../admin_profile_apdate.php" class="btn">Profile </a></li>
                 <li><a href="../logout.php" class="btn">logout </a></li>
             </ul>
         </div>
</div> 
                    </ul>
               </div>

          </div>
     </section>
     <?php
    include ("../conect_database.php");

    $admin_id = $_SESSION['admin_id'];
    // $teacher_name=$_SESSION['teacher_name'];
//     $admin_name=  $_SESSION['admin_name'];

    if (!isset($admin_id)) {
        header('location:/E-learningSystem/backend/index.php');
    }

    ?>