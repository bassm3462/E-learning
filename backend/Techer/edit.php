<?php
include("conect_database.php ");

// session_start();

include("header.php"); ?>

<?php
if (isset($_POST["save"])) {
    // $id = $_GET['id'];
    // $fileType = $_FILES["file"]["type"];
    $fileName = $_FILES["file"]["name"];
    $file = $_FILES["file"]["tmp_name"];
    // $file_size = $_FILES['file']['size'];
    $file_size =  filesize($file);
    $position = "Upload/" . basename($fileName);
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $chapter = $_POST["fname"];
    $title = $_POST["Tname"];
    $course_id = $_POST["course_id"];
    $old_file = $_POST['FILE_old'];
    $time_insert = date('Y-m-d-h-i-s');
    $uploadOk = 1;
    // if($fileName !=""){
    //     $fileName = $_FILES["file"]["name"];
    // }else{
    //     $fileName=$old_file;
    // }
    if (file_exists($position)) {
        $message[] = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($file_size === 0) {
        echo "Sorry, your file is empty.";
        $uploadOk = 0;
    }
    if ($file_size === 500000000) {
        echo "Sorry, your file is empty.";
        $uploadOk = 0;
    }
    $allowedfileExtensions = array('png', 'jpg', 'zip', 'txt', 'doc', 'pdf', 'MP4', 'MOV');
    if (!in_array($fileExtension, $allowedfileExtensions)) {
        $message[] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $message[] = "Sorry, your file was not uploaded.";
    } else {
        if(!empty($fileName)){
        $update = $conn->prepare("UPDATE lessons SET Chapter=:chapter,title=:title ,FILE=:FILE ,course_id=:course_id , time_insert=:time_insert WHERE lesson_id=$_POST[id]");
        $update->bindParam(":chapter", $chapter);
        $update->bindParam(":title", $title);
        $update->bindParam(":FILE", $fileName);
        $update->bindParam(":course_id", $course_id);
        $update->bindParam(":time_insert", $time_insert);
        $update->execute();
        if ($update) {
        
            move_uploaded_file($file,  $position);

            unlink('Upload/' . $old_file);
            }
            // header('location:/E-learningSystem/backend/Techer/admin.php');

            echo '<script> alert("The file has been update successfully")</script>';
        }
    }}
?>



    <div class="container" id="box">
    </div>
    <div class="container">
        <div class="edit">
            <h1 class="Edit_hder">Edit lessons</h1>

            <?php
            include("conect_database.php ");
            $id = $_GET['id'];

            $select = $conn->prepare("SELECT * FROM `lessons` WHERE lesson_id = :id");
            $select->bindParam("id", $id);
            $select->execute();
            $fetch = $select->fetch(PDO::FETCH_ASSOC);
            ?>

            <form method="post" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo $fetch['lesson_id'] ?>">

                <select class="form-control form-control-lg" name="course_id" id="" value=<?php echo $fetch['course_id'] ?>>
                    <?php
                    $select_course = $conn->prepare("SELECT *FROM courses");
                    $select_course->execute();
                    // $course_name=$select_course->setFetchMode(PDO::FETCH_ASSOC);
                    if ($select_course->rowCount() > 0) {
                        foreach ($select_course as $id_course) {
                    ?>
                            <option value=<?php echo $id_course['id'] ?>><?php echo $id_course["name"] ?></option>
                    <?php

                        }
                    }

                    ?>

                </select>
                <label for="fname">Lecture</label>
                <input class="form-control form-control-lg" type="text" name="fname" id="fname" placeholder="chapter" value="<?= $fetch['chapter'] ?>">
                <label for="Tname">Title</label>
                <input class="form-control form-control-lg" type="text" name="Tname" id="Tname" placeholder="title file" value="<?= $fetch['title'] ?>">

                <label for="file">Upload file:</label>

                <input type="file" name="file" id="file">

                <input type="hidden" name="FILE_old" value="<?= $fetch["FILE"] ?>">
                <br>
                <button type="submit" name="save" class="btn btn-primary">save</button>

            </form>
        </div>
    </div>
    <?php include "footer.php" ?>