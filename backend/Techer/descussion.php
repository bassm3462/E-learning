<?php

include "nvigation_tech.php";
include "conect_database.php";
include "header.php";
?>
<section class="information_box_message ">
    <div id="" class="descussion_box box_information container">
        <form method="post" action="cod.php">
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
    $show_message_student = $conn->prepare("SELECT *FROM descussion WHERE  teacher_id=$_SESSION[teacher_id]");
    $show_message_student->execute();
   
    foreach ($show_message_student as $row){ ?>
    <div class="container po_meassge">
    <div class="dsiplay_message ">
        <div><p><?php echo $row['text'] ?></p></div>
        <div> 
            <a href="reply.php?id=<?php echo $row['ID']?>&student_id=<?php $row['student_id']?>">Reply</a>
            <a href="delete_message.php?id=<?php echo $row['ID']?>" class="">delete</a>

        </div>
    </div>
    <?php 
     $show_message_reply = $conn->prepare("SELECT *FROM replay_message WHERE  $row[ID]=ID_replay AND teacher_id = $_SESSION[teacher_id] AND student_id=$_GET[id]");
     $show_message_reply->execute();
    foreach($show_message_reply as $reply){ ?>
    <div class="reply_meassg">
<p class=""><?php 
 echo $reply['text_replay']?></p>
 <a href="delete_maessgg.php?id=<?php echo $reply['replay_id'] ?>"><i class="fa-solid fa-trash-can btn" ></i></a>
 </div>
 
<?php }?>
    </div>
    <?php }?>
</section>