<?php
session_start();

include "conect_database.php";


$teacher_id = $_SESSION['teacher_id'];

if(!isset($teacher_id)){
 header('location:/E-learningSystem/backend/index.php');
}

?>
<?php
// include "header.php";
// include "conect_database.php";

// $teacher_id = $_SESSION['teacher_id'];

// function multiply_choice($conn){
if(isset($_GET['id'])){
    
        if(isset($_POST["save"])){

    $question= $_POST["Question"];
    $option_1=$_POST["option_1"];
    $option_2=$_POST["option_2"];
    $option_3=$_POST["option_3"];
    $option_4=$_POST["option_4"];
    $Answer=$_POST["answer"];
    $user_answer=$_POST["useranswer"];
    $course_id=$_POST["course_id"];
$quiz_det=$_GET['id'];
    $upload_quiz=$conn->prepare("INSERT INTO quiz (que,option_1 ,option_2,option_3, option_4,ans,userans ,teacher_id , course_id ,quiz_det )VALUE(:que,:option1,:option2,:option3,:option4,:ans ,:userans,:teacher_id,:course_id,:quiz_det )");
    $upload_quiz->bindParam(":que",$question);
    $upload_quiz->bindParam(":option1",$option_1);
    $upload_quiz->bindParam(":option2",$option_2);
    $upload_quiz->bindParam(":option3",$option_3);
    $upload_quiz->bindParam(":option4",$option_4);
    $upload_quiz->bindParam(":ans",$Answer);
    $upload_quiz->bindParam(":userans",$user_answer);
    $upload_quiz->bindParam(":course_id",$course_id);
    $upload_quiz->bindParam(":quiz_det",$quiz_det);
    $upload_quiz->bindParam(":teacher_id", $_SESSION['teacher_id']);
    if($upload_quiz->execute()){
        echo '<script> alert("The file has been uploaded successfully")</script>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">>invald</div>';
    }
    }
}
// }
// multiply_choice($conn);
?>

<div class="container">
    <div class="lessons" id="lessons">
        <h1>quizzs</h1>
        <form method="post">
            <label for="fname">course id</label>
            <select class="form-control form-control-lg" name="course_id" id="subject">
                <?php

                   function course_id($conn){
                    $select_course=$conn->prepare("SELECT *FROM courses");
                    $select_course->execute();
                    // $course_name=$select_course->setFetchMode(PDO::FETCH_ASSOC);
                    if($select_course->rowCount()>0){
                    foreach($select_course as $id_course){
                        ?>
                <option value=<?php echo $id_course['id'] ?>><?php echo $id_course["name"]?></ption>
                    <?php

                    }
                }
                   }
                   course_id($conn);
                   ?>

            </select>
            <label for="Question">Question</label>
            <input class="form-control form-control-lg" type="text" name="Question" id="Question" placeholder="subject"
                required>
            <label for="option_1">Option 1</label>
            <input class="form-control form-control-lg" type="text" name="option_1" id="option_1"
                placeholder="title file" required>
            <label for="option_2">Option 2</label>
            <input class="form-control form-control-lg" type="text" name="option_2" id="option_2"
                placeholder="title file" required>
            <label for="option_3">Option 3</label>
            <input class="form-control form-control-lg" type="text" name="option_3" id="option_3"
                placeholder="title file" required>
            <label for="option_4">option 4</label>
            <input class="form-control form-control-lg" type="text" name="option_4" id="option_4"
                placeholder="title file" required>

            <label for="answer">Answer</label>
            <input class="form-control form-control-lg" type="text" name="answer" id="answer" placeholder="title file"
                required>
            <label for="useranswer">user answer</label>
            <input class="form-control form-control-lg" type="text" name="useranswer" id="useranswer"
                placeholder="title file" required>

            <button type="submit" name="save" class="btn btn-primary">save</button>
        </form>
    </div>
</div>
