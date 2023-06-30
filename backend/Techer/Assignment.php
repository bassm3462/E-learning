<?php
include_once "header.php";
include "conect_database.php";
// session_start();
if ($_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST["save"])) {
        $fileName = $_FILES["file"]["name"];
        $file = $_FILES["file"]["tmp_name"];
        $file_size = $_FILES['file']['size'];
        $position = "Upload/" . $fileName;
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $title = $_POST["Tname"];
        $course_id = $_POST["course_id"];
        $time_insert = date('Y-m-d');
        $uploadOk = 1;
        if (file_exists($position)) {
            $message[] = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if ($file_size  > 5000000) {
            $message[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        $allowedfileExtensions = array('png', 'jpg', 'txt', 'doc', 'pdf');
        if (!in_array($fileExtension, $allowedfileExtensions)) {
            $message[] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            $message[] = "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($file, "Upload/" . $fileName)) {
                $upload_file = $conn->prepare("INSERT INTO assignment( name_ASSINMINT,file ,teacher_id,course_id,time_insert )VALUE(:name_ASSINMINT,:file,:teacher_id,:course_id,:time_insert)");
                $upload_file->bindParam(":file", $fileName);
                $upload_file->bindParam(":name_ASSINMINT", $title);
                $upload_file->bindParam(":teacher_id", $_SESSION['teacher_id']);
                $upload_file->bindParam(":course_id", $course_id);
                $upload_file->bindParam(":time_insert", $time_insert);
                if ($upload_file->execute()) {
                    $success[] = "The file has been uploaded successfully";
                } else {
                    $message[] = '<div class="alert alert-danger" role="alert">invalid</div>';
                }
            }
        }
    }
}
?>
<?php include "nvigation_tech.php" ?>
<?php
if (isset($message)) {
    foreach ($message as $message) {
?>
        <div class="message">
            <span><i class="fa-solid fa-circle-exclamation"></i><?php echo $message; ?></span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
<?php
    }
}
?>
<?php
if (isset($success)) {
    foreach ($success as $success) {
?>
        <div class="success">
            <span><?php echo $success; ?></span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
<?php
    }
}
?>
</div>
<div class="container" id="box">
    <button class="add btn btn-info ho " onclick="myaddLesson()">Add Assignment</button>
</div>
<div class="container">
    <div class="lessons" id="lessons">
        <div class="box btn dsiplay_buttom">
            <button class="close btn btn-success " onclick="myclose()"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <h1>Assignment</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="fname">course id</label>
            <select class="form-control form-control-lg" name="course_id" id="subject">
                <?php
                function course_id($conn)
                {
                    $select_course = $conn->prepare("SELECT *FROM courses");
                    $select_course->execute();
                    // $course_name=$select_course->setFetchMode(PDO::FETCH_ASSOC);
                    if ($select_course->rowCount() > 0) {
                        foreach ($select_course as $id_course) {
                ?>
                            <option value=<?php echo $id_course['id'] ?>><?php echo $id_course["name"] ?></option>
                <?php
                        }
                    } else {
                        echo "no courses";
                    }
                }
                course_id($conn);
                ?>
            </select>

            <label for="Tname">Title</label>
            <input class="form-control form-control-lg" type="text" name="Tname" id="Tname" placeholder="title file" required>
            <label for="file">Upload file:</label>
            <input type="file" name="file" id="upload" required>
            <button type="submit" name="save" class="btn btn-primary">save</button>
        </form>
    </div>
</div>


<?php
include "conect_database.php";
$dsiplay = $conn->prepare("SELECT*FROM assignment WHERE teacher_id= $_SESSION[teacher_id]");
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
                        <!-- <tr>
                            <th>Title</th>
                            <th>File</th>
                            <th width="300px">action</th>
                        </tr> -->
                        <?php
                        if ($dsiplay->rowCount() > 0) {
                            foreach ($dsiplay as $value) {
                        ?>
                                <ul class="display_lessons">
                                    <li><?php echo $value["name_ASSINMINT"] ?>
                                    <?php echo $value["FILE_TYPE"] ?>
                                    <?php echo "<a href='" . $value["POSITION"] . "' download>" . $value["file"] . "" ?><i class="fa-sharp fa-solid fa-download"></i></a>
                            </li>
                                    <li> <form action="delet_assigm.php" method="post">
    <input type="hidden" name="id" id="" value="<?php echo $value['ID'] ?>">
    <input type="hidden" name="file" id="" value="<?php echo $value['file'] ?>">
    <button type="submit"  class="btn btn-success"name="btn_delete">Delete</button>
                                        <a href="edit.php?id=<?php echo $value["ID"] ?>" class="btn btn-primary"> Edit</a>
                                        <a href="Upload/<?php echo $value['file'] ?>" target="_blank" class="btn btn-info">view
                                            file</a>
                                    </li>
                                </ul>
                            </form>
                            
                            <?php
                            }
                        } else {
                            ?>
                            <div>
                                <h3 class="title_lessons">no file</h3>
                            </div>
                        <?php
                        }
                        ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>