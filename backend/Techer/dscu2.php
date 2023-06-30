<?php

// include "nvigation_tech.php";
include "conect_database.php";
include "header.php";
include ("../Config.php");
?>
<?php
if (isset($_POST["save_message"])) {
    $id=encryptor("decrypt" ,$_GET['id']);
    date_default_timezone_set("Asia/Baghdad");
    $select_course = filter_var($_POST["course_id"], FILTER_SANITIZE_NUMBER_INT);
    $text = filter_var($_POST["text"], FILTER_SANITIZE_STRING);
    $user_type = filter_var($_GET["user"], FILTER_SANITIZE_STRING);

    $time_insert = date('Y-m-d-h-m-s');
    $id_student = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $insert = $conn->prepare("INSERT INTO descussion (course_id,text ,teacher_id ,time_insert , student_id,user_type)VALUE(:course_id  ,:text ,:teacher_id,:time_insert,:student_id,:type_user)");
    $insert->bindParam(":course_id", $select_course);
    $insert->bindParam(":text", $text);
    $insert->bindParam(":student_id", $id_student);
    $insert->bindParam(":teacher_id", $_SESSION['teacher_id']);
    $insert->bindParam(":time_insert", $time_insert);
    $insert->bindParam(":type_user", $_GET['user']);
    $insert->execute();
    if ($insert) {
        // header('location:/E-learningSystem/backend/Techer/dscu2.php');
    } else {
        echo "valed";
    }
}
?>
<section class="information_box_message ">
    <div id="" class="descussion_box box_information container">
        <form method="post" action="">
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
                    }
                }
                course_id($conn);
                ?>
            </select>
            <label for="text">insert text </label>
            <textarea class="form-control form-control-lg" id="text" name="text" rows="4" cols="50">
        </textarea>
            <button type="submit" name="save_message" class="btn btn-primary">save</button>
        </form>
    </div>
</section>
<section class="information_box_message">
    <?php
     $id=encryptor("decrypt" ,$_GET['id']);
    $show_message_student = $conn->prepare("SELECT *FROM descussion WHERE  teacher_id=$_SESSION[teacher_id] and student_id=$id");
    $show_message_student->execute();
if($show_message_student->rowCount()>0){
    foreach ($show_message_student as $row) { ?>
        <div class="container po_meassge">
            <div class="dsiplay_message ">
                <div>
                    <p><?php echo $row['text'] ?></p>
                </div>
                <div>
                    <a href="reply.php?id=<?php echo $row['ID'] ?>&student_id=<?php echo $row['student_id'] ?>">Reply</a>
                    <a href="delete_message.php?id=<?php echo $row['ID'] ?>" class="">delete</a>

                </div>
            </div>
            <?php
            $show_message_reply = $conn->prepare("SELECT *FROM replay_message WHERE  ID_replay= $row[ID] AND teacher_id = $_SESSION[teacher_id] AND student_id=$_GET[id]");
     $show_message_reply->execute();
    foreach($show_message_reply as $reply){ ?>
    <div class="reply_meassg">
<p class=""><?php 
 echo $reply['text_replay']?></p>
 <a href="delete_replay_massege.php?id=<?php echo $reply['replay_id'] ?>"><i class="fa-solid fa-trash-can btn" ></i></a>
 </div>
 
<?php } ?>

        </div>
    <?php }}else{

        ?>
        <h1>NO Message</h1>
        <?php
    } ?>
</section>