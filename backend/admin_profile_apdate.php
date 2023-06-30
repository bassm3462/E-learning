<?php

include 'conect_database.php';

session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
   header('location:/E-learningSystem/backend/index.php');
}

if(isset($_POST['update'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   
   $update_profile = $conn->prepare("UPDATE `user_form` SET name =:name, email = :email WHERE id = :id");
  $update_profile->bindParam(":name",$name);
  $update_profile->bindParam(":email",$email);
  $update_profile->bindParam(":id",$admin_id);

   $update_profile->execute();

   $old_image = $_POST['old_image'];
   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'uploaded_img/'.$image;

   if(!empty($image)){

      if($image_size > 2000000){
         $message[] = 'image size is too large';
      }else{
         $update_image = $conn->prepare("UPDATE `user_form` SET image = :image WHERE ID = :ID");
  $update_image->bindParam(":image",$image);
  $update_image->bindParam(":ID",$admin_id);

         $update_image->execute();

         if($update_image){
            if($image=="images_pofile.png"){
               move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'image has been updated!';

            }
            else{
            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('uploaded_img/'.$old_image);
            $message[] = 'image has been updated!';
            }
         }
      }

   }

   $old_pass = $_POST['old_pass'];
   $previous_pass = md5($_POST['previous_pass']);
   $previous_pass = filter_var($previous_pass, FILTER_SANITIZE_STRING);
   $new_pass = md5($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = md5($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if(!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($previous_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         $update_password = $conn->prepare("UPDATE `user_form` SET password = :password WHERE id = :id");
         $update_password->bindParam("password",$confirm_pass);
         $update_password->bindParam("id",$admin_id);

         $update_password->execute();
         $message[] = 'password has been updated!';
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

    <title>admin profile update</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style/profile.css">


</head>

<body>

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

    <h1 class="title"> update <span>Admin</span> profile </h1>

    <section class="update-profile-container">

        <?php
      $select_profile = $conn->prepare("SELECT * FROM `user_form` WHERE id = :id");
  $select_profile->bindParam(":id",$admin_id);
      
      $select_profile->execute();
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>

        <form action="" method="post" enctype="multipart/form-data">
            <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
            <div class="flex">
                <div class="inputBox">
                    <span>username : </span>
                    <input type="text" name="name" required class="box" placeholder="enter your name"
                        value="<?= $fetch_profile['name']; ?>">
                    <span>email : </span>
                    <input type="email" name="email" required class="box" placeholder="enter your email"
                        value="<?= $fetch_profile['email']; ?>">
                    <span>profile pic : </span>
                    <input type="hidden" name="old_image" value="<?= $fetch_profile['image']; ?>">
                    <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
                    <span>old password :</span>
                    <input type="password" class="box" name="previous_pass" placeholder="enter previous password">
                    <span>new password :</span>
                    <input type="password" class="box" name="new_pass" placeholder="enter new password">
                    <span>confirm password :</span>
                    <input type="password" class="box" name="confirm_pass" placeholder="confirm new password">
                </div>
            </div>
            <div class="flex-btn">
                <input type="submit" value="update profile" name="update" class="btn">
                <a href="admin/dashboard_1.php" class="option-btn">go back</a>
            </div>
        </form>

    </section>

</body>

</html>