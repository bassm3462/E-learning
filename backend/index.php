<?php
include "conect_database.php";
// include "db.php";

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select = $conn->prepare("SELECT * FROM `user_form` WHERE email = :email AND password = :password");
   $select->bindParam(":email",$email);
   $select->bindParam(":password",$pass);
   $select->execute();
   $row = $select->fetch(PDO::FETCH_ASSOC);
// $select="SELECT * FROM `user_form` WHERE email = $email AND password = $pass";
// $result=mysqli_query($conn,$select);
// $count=mysqli_num_rows($result);
//    if($row->rowCount() > 0){
if($row['ACTIVTION']=="1"){
    if($row['user_type'] == 'teacher'){

         $_SESSION['teacher_id'] = $row['ID'];
        //  $_SESSION['teacher_name']=$row['name'];
         header('location:/E-learningSystem/backend/Techer/dashboart.php');

      }elseif($row['user_type'] == 'student'){

         $_SESSION['student_id'] = $row['ID'];
        //  $_SESSION['student_name']=$row['name'];

         header('location:/E-learningSystem/backend/students/hom.php');
        }
         elseif($row['user_type'] == 'admin'){

            $_SESSION['admin_id'] = $row['ID'];
        //  $_SESSION['admin_name']=$row['name'];

            header('location:/E-learningSystem/backend/admin/dashboard_1.php');

}
else{
         $message[] = 'no user found !';
      }
      
    }
   else{
      $message[] ="Please active Email";
   }
   

}    
else{
    $message[]= 'incorrect email or password!';

   }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" media="all" />
    <!-- <link rel="stylesheet" href="style/Profile.css"> -->
    <?php include "header.php";?>

    <!-- title the pge -->
    <title>LOG IN</title>
</head>

<body>
    <?php
   if(isset($message)){
      foreach($message as $message){
         ?>
    <div class="message">
        <span><i class="fa-solid fa-circle-exclamation"></i><?php echo $message ;?></span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
    <?php
      }
   }
?>
    <?php
   if(isset($success)){
      foreach($success as $success){
         ?>
    <div class="success">
        <span><?php echo $success ;?></span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
    <?php
      }
   }
?>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="https://img.freepik.com/premium-vector/online-school-logo-learning-logo-design-vector_567288-21.jpg"
                                            style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1"></h4>
                                    </div>

                                    <form method="post" enctype="multipart/form-data">
                                        <p>Please login to your account</p>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder=" email address" />
                                            <label class="form-label" for="email" required>email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="pass" name="pass" class="form-control" />
                                            <label class="form-label" for="pass" required>Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input type="submit" name="submit"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Log
                                            in</input>
                                            <a class="text-muted" href="forgot_password.php">Forgot password?</a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="register.php" class="btn btn-outline-danger">Create new</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4"></h4>
                                    <p class="small mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>