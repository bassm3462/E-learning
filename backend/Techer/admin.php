<!-- <script>
    let lessons = document.querySelector("#lessons");

    function myaddLesson() {
        document.querySelector("#lessons").style.display = "block";
        document.getElementById("link").style.display = "none";


        // alert("dsafsadf");
    }

    function myclose() {
        document.querySelector("#lessons").style.display = "none";
    }
    myaddLesson();
    myclose();
    let link = document.getElementById("link");
    let file = document.getElementById("file");

    function mylink() {
        document.getElementById("link").style.display = "block";
        document.getElementById("file").style.display = "none";
    }

    function myfile() {
        document.getElementById("link").style.display = "none";
        document.getElementById("file").style.display = "block";
    }
    mylink();
    myfile();
    let func_dsiplay = document.getElementById("dsiplay_link").addEventListener("click", function() {
        document.getElementById("link").style.display = "block";
        document.getElementById("file").style.display = "none";
    });
    let func_dsiplay2 = document.getElementById("dsiplay_file").addEventListener("click", function() {
        document.getElementById("dsiplay_link").style.display = "none";
        document.getElementById("dsiplay_file").style.display = "block";
    });
</script> -->

<?php
include_once "header.php";
include("conect_database.php ");
// session_start();
// ini_set(w)

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST["save"])) {
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
        $time_insert = date('Y-m-d');
        $uploadOk = 1;
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
            if (move_uploaded_file($file, $position)) {
                $upload_file = $conn->prepare("INSERT INTO lessons(chapter,title ,FILE,teacher_id, course_id,time_insert )VALUE(:chapter,:title,:FILE,:teacher_id,:course_id,:time_insert )");
                $upload_file->bindParam(":FILE", $fileName);
                $upload_file->bindParam(":chapter", $chapter);
                $upload_file->bindParam(":title", $title);
                $upload_file->bindParam(":course_id", $course_id);
                $upload_file->bindParam(":teacher_id", $_SESSION['teacher_id']);
                $upload_file->bindParam(":time_insert", $time_insert);
                if ($upload_file->execute()) {
                    $success[] = "The file has been uploaded successfully";
                } else {
                    $message[] = '<div class="alert alert-danger" role="alert">>invald</div>';
                }
            }
        }
    }
}
?>
<?php
function addlink($conn)
{
    include("conect_database.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["sent"])) {
            $TITLE = $_POST["title"];
            $SELECT = $_POST["select"];
            $TEXT = $_POST["text"];


            $insert = $conn->prepare("INSERT INTO less_link (title,chose,ttext ,teacher_id)VALUE(:tilte , :chose ,:ttext ,:teacher_id)");
            $insert->bindParam(":tilte", $TITLE);
            $insert->bindParam(":chose", $SELECT);
            $insert->bindParam(":ttext", $TEXT);
            $insert->bindParam(":teacher_id", $_SESSION['teacher_id']);

            if ($insert->execute()) {
                $success[] = "The file has been uploaded successfully";
            } else {
                echo  $message[] = 'invalid';
            }
        }
    }
}
addlink($conn);


?>

<?php include "nvigation_tech.php"; ?>

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
<div class="container" id="box">
    <button class="add btn btn-info ho " onclick="myaddLesson()">Add lessons</button>
</div>
<div class="container">
    <div class="lessons" id="lessons">
        <div class="box btn dsiplay_buttom">
            <button class=" btn btn-success " onclick="myclose()"><i class="fa-solid fa-xmark"></i></button>


            <button class="btn btn-success" onclick="mylink()"><i class="fa-solid fa-square-up-right"></i></button>
            <button class="btn btn-primary" onclick="myfile()"><i class="fa-solid fa-file-lines"></i></button>
        </div>
        <h1>list lessons</h1>
        <div id="file">
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
                                <option value=<?php echo $id_course['id'] ?>><?php echo $id_course["name"] ?></ption>
                        <?php

                            }
                        }
                    }
                    course_id($conn);
                        ?>

                </select>
                <label for="fname">Lecture</label>
                <input class="form-control form-control-lg" type="text" name="fname" id="fname" placeholder="Lecture" required>

                <label for="Tname">Title</label>
                <input class="form-control form-control-lg" type="text" name="Tname" id="Tname" placeholder="title file" required>

                </select>
                <label for="file">Upload file:</label>
                <input type="file" name="file" id="upload" required>
                <button type="submit" name="save" class="btn btn-primary">save</button>
            </form>
        </div>
        <div id="link">

            <form method="POST">
                <label for="title">title</label>
                <input class="form-control form-control-lg" type="text" name="title" id="title" placeholder="title" required>
                <label for="select">select</label>
                <select class="form-control form-control-lg" type="text" name="select" id="select">
                    <option value="text">Text</option>
                    <option value="link">Link</option>
                </select>
                <label for="text">text</label>
                <input class="form-control form-control-lg" type="text" name="text" id="text" required>
                <input type="submit" value="submit" name="sent" class="btn btn-info">
            </form>


        </div>
    </div>
</div>

<?php
include "conect_database.php";
$dsiplay = $conn->prepare("SELECT*FROM lessons  where teacher_id= $_SESSION[teacher_id]");
// $dsiplay->bindParam("teacher_id",$teacher_id);
$dsiplay->execute();
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2> Information Lessons</h2>
                    
                </div>
                <div class="card-body">
                   
                        <?php
                        if ($dsiplay->rowCount() > 0) {
                            foreach ($dsiplay as $value) {
                        ?>
                                <ul class="display_lessons">
                                    <li><?php echo $value["chapter"] ?>
                                    <?php echo $value["title"] ?>
                                  
                                        <?php echo $value['FILE'] ?>
                                    </li>

                                    <li class="dsiplay_action"> 
                                    <form action="delet_lesson.php" method="post">
    <input type="hidden" name="id" id="" value="<?php echo $value['lesson_id'] ?>">
    <input type="hidden" name="file" id="" value="<?php echo $value['FILE'] ?>">
    <button type="submit"  class="btn btn-success"name="btn_delete">Delete</button>

                                        <a href="edit.php?id=<?php echo $value["lesson_id"] ?>" class="btn btn-primary"> Edit</a>
                                        <a href="Upload/<?php echo $value['FILE'] ?>" target="_blank" class="btn btn-info">view
                                            file</a>
                                        <a href="../Techer/Upload/<?php echo $value['FILE'] ?>" download="<?php echo $value['FILE'] ?> " class="btn btn-light">Download</a>
                                    </form>
                                    </li>
                                </ul>
                            <?php
                            }
                        } else {
                            ?>
                            <div>
                                <h3>no file</h3>
                            </div>
                        <?php
                        }
                        ?>
                
                </div>
            </div>
        </div>
    </div>

</div>
<div id="dsiplay_link">
    <?php
    function dsiplay_link()
    {
        include "conect_database.php";
        $dsiplay_link = $conn->prepare("SELECT*FROM less_link WHERE teacher_id= $_SESSION[teacher_id] AND chose='link' ");
        // $dsiplay->bindParam("teacher_id",$teacher_id);
        $dsiplay_link->execute();
    ?>
        <div>
            <?php
            if ($dsiplay_link->rowCount() > 0) {
                foreach ($dsiplay_link as $row) {

            ?>
                    <a href="<?php echo $row['ttext'] ?>" target="_blank"><?php echo $row['ttext'] ?></a>
                    <!-- <a href="" target="_blank" rel="noopener noreferrer"></a> -->
            <?php

                }
            }

            ?>
        </div>
    <?php
    }
    dsiplay_link($conn)
    ?>
</div>
<div id="dsiplay_text">
    <?php
    function dsiplay_text($conn)
    {
        include "conect_database.php";
        $dsiplay_link = $conn->prepare("SELECT*FROM less_link WHERE chose='Text' AND teacher_id= $_SESSION[teacher_id]");
        // $dsiplay->bindParam("teacher_id",$teacher_id);
        $dsiplay_link->execute();
    ?>
        <div>
            <?php
            if ($dsiplay_link->rowCount() > 0) {
                foreach ($dsiplay_link as $row) {

            ?>
                    <p><?php echo $row['ttext'] ?></p>
            <?php

                }
            }

            ?>
        </div>
    <?php
    }
    dsiplay_text($conn);
    ?>
</div>
<?php include "footer.php" ?>