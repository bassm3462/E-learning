<?php
include 'conect_database.php';

$image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'uploaded_img/'.$image;
   if($image_size > 2000000){
    $message[] = 'image size is too large!';


   }
   else{
    $insert = $conn->prepare("INSERT INTO user_form ( image) VALUES:image,:user_type)");
    $insert->bindParam("name",$name);
    $insert->bindParam("email",$email);
    $insert->bindParam("password",$cpass);
    $insert->bindParam("image",$image);
    $insert->bindParam("user_type",$groub);
   }
?>





<?php include "header.php";?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-outline mb-4">
        <input type="file" name="image" id="image" class=" form-control form-control-lg"
            accept="image/jpg, image/png, image/jpeg">
    </div>

</form>