<?php
include "header.php";
include "conect_database.php";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST["save"])) {
        $fileName = $_FILES["upload"]["name"];
        $file = $_FILES["upload"]["tmp_name"];
        $file_size = $_FILES['upload']['size'];
        $position = "../Techer/Upload/" . $fileName;
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        // $title=$_POST[ "Tname"];
        $teacher_id = $_GET["teacher_id"];
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
            if (move_uploaded_file($file, "../Techer/Upload/" . $fileName)) {
                $upload_file = $conn->prepare("INSERT INTO quize( file ,teacher_id,time_insert,student_id )VALUE(:file,:teacher_id,:time_insert,:student_id)");
                $upload_file->bindParam(":file", $fileName);
                $upload_file->bindParam(":teacher_id", $teacher_id);
                $upload_file->bindParam(":student_id", $_SESSION['student_id']);

                $upload_file->bindParam(":time_insert", $time_insert);
                if ($upload_file->execute()) {
                    $message[] = "The file has been uploaded successfully";
                } else {
                    $message[] = '<div class="alert alert-danger" role="alert">>invald</div>';
                }
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
    <title>upload quiz </title>
    <link rel="stylesheet" href="../../frontend/Style/Score.css">

</head>

<body>
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
    $dsiplay = $conn->prepare("SELECT*FROM quize WHERE ID=$_GET[id]");
    $dsiplay->execute();
    foreach ($dsiplay as $value) {
    ?>
        <div class="information_box">
            <div class="box_info container ">
            <div class="assimgint_detalis">
                <h3><?php echo $value['name_quize'] ?></h3>
                <h3> <img src="../../frontend/image/paper.png" alt="" srcset="" class="imag_upload" width=""> <a href="../Techer/Upload/<?php echo $value['file'] ?>" target="_blank">view
                        file</a> </h3>
            <?php } ?>
            </div>
            <div class="submit_assig">
                <div class="">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="">
                            <input  type="file" name="upload" id="file_sent" class="hidden_file">
                            <label for="file_sent"><img src="../../frontend/image/upload-file.png" alt="" class="image_sent image_upload" ></label>
                        </div>
                        <button type="submit" name="save" class="btn btn-info btn_sent">Send</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
</body>
</html>