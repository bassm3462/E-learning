<?php
include "header.php";
include "conect_database.php";

if (isset($_POST["save"])) {
    $select_que = filter_var($_POST["number_que"], FILTER_SANITIZE_NUMBER_INT);
    $select_score = filter_var($_POST["score"], FILTER_SANITIZE_NUMBER_INT);
    if (!empty($select_que) && !empty($select_score)) {
        $insert = $conn->prepare("INSERT INTO details_q (number_of_que,score ,teacher_id)value(:number_of_que,:score,:teacher_id)");
        $insert->bindParam(":number_of_que", $select_que);
        $insert->bindParam(":score", $select_score);
        $insert->bindParam(":teacher_id", $_SESSION['teacher_id']);
        $insert->execute();
        if ($insert == TRUE) {
            header('location:/MyProject2/backend/Techer/quiz_multi_choes.php');

            echo " insert info successfully";
        } else {
            echo " invalid";
        }
    } else {
        echo "Please insert info";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details Quiz</title>
</head>

<body>
    <section>
        <form action="" method="post">
            <label for="number_que">
                Select Number Of Questions</label>
            <input type="number" name="number_que" id="" min="1">
            <label for="score">
                Select Score Each Question</label>
            <input type="number" name="score" id="" min="1" max="10">
            <input type="submit" name="save" value="submit">
        </form>
    </section>
    <section>
        <?php
        $show_details = $conn->prepare("SELECT *FROM details_q WHERE  teacher_id=$_SESSION[teacher_id]");
        $show_details->execute();
        ?>
        <?php
        foreach ($show_details as $row) {
        ?><div class="container">
                <div>
                    <p> quiz the number of questions is <?php echo $row['number_of_que'] ?> and each questions score is <?php echo $row['score'] ?></p>
                </div>
                <div> <a href="quiz_multi_choes.php?id=<?php echo $row["id_det"] ?>">More details</a></div>
            <?php } ?>

            </div>
    </section>


</body>

</html>