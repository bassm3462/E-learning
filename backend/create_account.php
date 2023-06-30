<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
   $groub=$_POST['groub'];
   $groub = filter_var($groub, FILTER_SANITIZE_STRING);


   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM user_form WHERE email = :email");
   $select->bindParam("email",$email);
   $select->execute();

   if($select->rowCount() > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = $conn->prepare("INSERT INTO user_form (name, email, password, image , user_type) VALUES(:name,:email,:password,:image,:user_type)");
         // $insert = $conn->prepare("INSERT INTO user_form (name, email, password, image , user_type) VALUES(?,?,?,?,?)");
         $insert->bindParam("name",$name);
         $insert->bindParam("email",$email);
         $insert->bindParam("password",$cpass);
         $insert->bindParam("image",$image);
         $insert->bindParam("user_type",$groub);
       $insert->execute();
         // $insert->execute([$name, $email, $cpass, $image, $groub]);
         if  ($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered succesfully!';
            header('location:login.php');
         }
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="admin/css/all.min.css">
    <link rel="stylesheet" href="admin/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="admin/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="admin/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/create.css"> -->
    <link rel="stylesheet" href="style/profile.css">
    
    <?php include "header.php";?>


    <title>Document</title>
</head>
<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
<body id="cont">
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
                                        <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                                    </div>

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <p>Please login to your account</p>
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="Enter your name" />
                                            <label class="form-label" for="form2Example11" required>Full Name</label>
                                        </div>


                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder=" email address" required/>
                                            <label class="form-label" for="form2Example11">email</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder=" Enter your password" />
                                            <label class="form-label" for="form2Example11" required>password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="passowrd" name="cpass" class="form-control"
                                                placeholder="Confirm your password" />
                                            <label class="form-label" for="passowrd" required> Confirm Password</label>
                                        </div>
                                        <div class="form-outline mb-4">

                                            <input type="file" name="image" class="form-control"
                                                accept="image/jpg, image/png, image/jpeg">
                                            <label class="form-label" for="passowrd"> Upload image</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <select class="form-control" name="groub" id="groub">
                                                <option value="admin">admin</option>
                                                <option value="student">student</option>
                                            </select>
                                            <label class="form-label" for="passowrd"> SELECT</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit"> Rigester Now</button>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <a href="login.php" class="btn btn-outline-danger">log in</a>
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