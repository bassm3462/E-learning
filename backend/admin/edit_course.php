<?php include('header.php');
include ("../conect_database.php");
?>
<?php
if (isset($_POST['update'])) {

$course_name = $_POST['name'];
$course_name = filter_var($course_name, FILTER_SANITIZE_STRING);
$category = $_POST['category'];
$category = filter_var($category, FILTER_SANITIZE_STRING);
$time_insert = date('Y-m-d');
$duration=$_POST['duration'];
$old_image = $_POST['old_image'];
$image = $_FILES['image']['name'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_size = $_FILES['image']['size'];
$image_folder = 'upload/' . $image;

if (!empty($image)) {

   if ($image_size > 2000000) {
      $message[] = 'image size is too large';
   } else {
$update_image = $conn->prepare("UPDATE courses SET name =:name, category = :category ,image =:image ,date=:time_insert,duration=:duration WHERE ID = $_GET[id]");
$update_image->bindParam(":name", $course_name);
$update_image->bindParam(":category", $category);
$update_image->bindParam(":image", $image);
$update_image->bindParam(":time_insert",$time_insert);
$update_image->bindParam(":duration",$duration);

// $update_image->bindParam(":id", $admin_id);
$update_image->execute();

      if ($update_image) {
         move_uploaded_file($image_tmp_name , $image_folder);
         unlink('upload/' . $old_image);
         $message[] = 'image has been updated!';
         header('location:/E-learningSystem/backend/admin/course.php');

      }
   }
}}

?>
<?php
      $select_profile = $conn->prepare("SELECT * FROM `courses` WHERE ID = :id");
      $select_profile->bindParam("id",$_GET['id'] );
      $select_profile->execute();
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
<section class="content container"style="margin-top:20px">
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
                <input type="text" name="name" placeholder="Course Name" required class="form-control " value=" <?= $fetch_profile['name'];?>">
              </div>
              <div class="form-group">
                <label for="category">Course Category</label>
                <input type="text" name="category" id="category" class="form-control" value="<?= $fetch_profile['category'];?>">
                  
              </div>
              <div class="form-group">
                <label for="duration">Course Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" placeholder="Course Duration"  value="<?= $fetch_profile['duration'];?>" required>
              </div>
              <div class="form-group">
               <input type="hidden" name="old_image" value="<?= $fetch_profile['image']; ?>">

                <input type="file" name="image" id="image" >
              </div>
              <button name="update" class="btn btn-success">
                Submit
              </button>
            </form>
          </div>
        </div>