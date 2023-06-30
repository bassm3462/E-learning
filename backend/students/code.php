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
        // if (file_exists($position)) {
        //     $message[] = "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
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
                $upload_file = $conn->prepare("INSERT INTO assignment( file ,teacher_id,time_insert,student_id )VALUE(:file,:teacher_id,:time_insert,:student_id)");
                $upload_file->bindParam(":file", $fileName);
                $upload_file->bindParam(":teacher_id", $teacher_id);
                $upload_file->bindParam(":student_id", $_SESSION['student_id']);
                $upload_file->bindParam(":time_insert", $time_insert);
                if ($upload_file->execute()) {
         header('location:/E-learningSystem/backend/student/assignment_det.php');
                    
                } else {
                    $message[] = '<div class="alert alert-danger" role="alert">>invald</div>';
                }
            }
        }
    }
}?>