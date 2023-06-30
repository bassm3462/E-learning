
<?php

// include ("../conect_database.php");
// session_start();

// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
  
//  header('location:/MyProject2/backend/index.php');
// }


?>
<?php include('../conect_database.php');
include_once "header.php";
?>
<?php
  if(isset($_POST['submit']))
  {
    date_default_timezone_set("Asia/Baghdad");
    $name = $_POST['name'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $today = date('Y-m-d-h:i:sa');
    $image = $_FILES['image']['name'];
    // $imageFileType = strtolower(pathinfo($_FILES['image']['type'],PATHINFO_EXTENSION));
    $fileNameCmps = explode(".", $image);
        $fileExtension = strtolower(end($fileNameCmps));
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = 'upload/'.$image;
    $uploadOk=1;
    // Check if file already exists
    if (file_exists($image)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($image_size > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
     $allowedfileExtensions = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array($fileExtension, $allowedfileExtensions)) {
            $message[] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            $uploadOk = 0;
        }
   
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($image_tmp_name, $image_folder)) {

        $upload_image=$conn->prepare("INSERT INTO courses (name, category, duration,image, date) VALUES (:name, :category, :duration, :image, :date)");

       $upload_image->bindParam(":name",$name);
       $upload_image->bindParam(":category",$category);
       $upload_image->bindParam(":duration",$duration);
       $upload_image->bindParam(":image",$image);
       $upload_image->bindParam(":date",$today);
  if($upload_image->execute()){
    echo "<div>Course has been uploaded successfuly</div>";
    header('Location: course.php'); exit;
  }else{
echo "Sorry , there was an error uploading your file.";

  }
      }
    }
  }
  
?>
<?php 
include "nav.php";
// include('header.php');
?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
          
          </div>
          <?php
           
            if(isset($_SESSION['success_msg']))
            {?>
              <div class="col-12">
                <small class="text-success" style="font-size:16px"><?=$_SESSION['success_msg']?></small>
              </div>
            <?php 
              unset($_SESSION['success_msg']);
            }
          ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 
    <section class="content container " style="margin-top:20px ;">
      <div class="container-fluid">
             
        <!-- Info boxes -->
        <div class="card">
          <div class="card-header py-2">
            <h3 class="card-title">
              Add New Course
            </h3>
          </div>
          <div class="card-body ">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" name="name" placeholder="Course Name" required class="form-control">
              </div>
              <div class="form-group">
                <label for="category">Course Category</label>
                <input type="text" name="category" id="category" class="form-control">
                  
              </div>
              <div class="form-group">
                <label for="duration">Course Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" placeholder="Course Duration" required>
              </div>
              <div class="form-group">
                <input type="file" name="image" id="image" required>
              </div>
              <button name="submit" class="btn btn-success">
                Submit
              </button>
            </form>
          </div>
        </div>
        <!-- /.row -->
      
        <!-- Info boxes -->
       <?php $dsiplay=$conn->prepare("SELECT*FROM courses");
$dsiplay->execute();
?>
     <div class="container mt-5">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header bg-info">
                         <h2> info to table</h2>
                     </div>
                     <div class="card-body">
                         <table class="table">
                             <tr>
                             <th>course imge</th>

                                 <th>course name</th>
                                 <th>dscrption</th>

                                 <th>duration</th>
                                 <th>date</th>

                                 <th width="300px">action</th>
                             </tr>
                             <?php
                            if ($dsiplay->rowCount()>0) {
                                foreach($dsiplay as $value){
                            ?>
                             <tr>
                              
                             <td><img src="upload/<?= $value["image"]; ?>" alt="" width="200px"></td>
                                 <td><?php echo $value["name"]?></td>
                                
                                 <td><?php echo $value["category"]?></td>
                                 <td><?php echo $value["duration"]?></td>
                                 <td><?php echo $value["date"]?></td>
                                
                                   
                                 <td>
                                         <form action="delete_course.php" method="post">
    <input type="hidden" name="id" id="" value="<?php echo $value['id'] ?>">
    <input type="hidden" name="file" id="" value="<?php echo $value['image'] ?>">
    <button type="submit"  class="btn btn-success"name="btn_delete">Delete</button>

                                     <a href="edit_course.php?id=<?php echo $value["id"]?>" class="btn btn-primary"> Edit</a>

                                 </td>
                             </tr>
                             <?php
                                }
                            }
                            else{
?>
                             <tr>
                                 <td>no file</td>
                             </tr>
                             <?php      
                    }
?>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 