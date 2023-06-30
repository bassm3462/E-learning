<?php
// include "header.php";
include "conect_database.php";

@session_start();
$student_id = $_SESSION['student_id'];
if (!isset($student_id)) {
    header('location:/E-learningSystem/backend/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/Style/quize.css">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="title">E-learning</div>
        <?php
        if (isset($_POST['click']) || isset($_GET['start'])) {
            @$_SESSION['clicks'] += 1;
            $c = $_SESSION['clicks'];
            if (isset($_POST['userans'])) {

                $userselected = $_POST['userans'];
                $fetchqry2 = $conn->prepare("UPDATE `quiz_m` SET `userans`='$userselected' WHERE `id`=$c-1");
                $fetchqry2->execute();
            }
        } else {
            $_SESSION['clicks'] = 0;
        }
        //echo($_SESSION['clicks']);
        ?>
        <div class="bump"><br>
            <form>
                <?php if ($_SESSION['clicks'] == 0) { ?>
                    <button class="button" name="start" float="left"><span>START
                            QUIZ</span></button> <?php } ?>
            </form>
        </div>
        <?php
        $detaile_quiz = $conn->prepare("SELECT *FROM details_q");
        $detaile_quiz->execute();
        $fetch_det = $detaile_quiz->fetch(PDO::FETCH_ASSOC);
         die( $det = $fetch_det["number_of_que"] - 1);
        ?>
        <form action="" method="post">
            <table>
                <?php if (isset($c)) {
                    $fetchqry = $conn->prepare("SELECT *FROM quiz_m  WHERE id=$c");
                    $fetchqry->execute();
                    foreach ($fetchqry as $row) {
                ?>
                        <tr>
                            <td>
                                <h3><br><?php echo @$row['que']; ?></h3>
                            </td>
                        </tr>
                        <?php if ($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < $fetch_det["number_of_que"]) { ?>
                            <tr>
                                <td><input required type="radio" name="userans" value="<?php echo $row['option_1']; ?>">&nbsp;<?php echo $row['option_1']; ?><br>
                            <tr>
                                <td><input required type="radio" name="userans" value="<?php echo $row['option_2']; ?>">&nbsp;<?php echo $row['option_2']; ?></td>
                            </tr>
                            <tr>
                                <td><input required type="radio" name="userans" value="<?php echo $row['option_3']; ?>">&nbsp;<?php echo $row['option_3']; ?></td>
                            </tr>
                            <tr>
                                <td><input required type="radio" name="userans" value="<?php echo $row['option_4']; ?>">&nbsp;<?php echo $row['option_4']; ?><br><br><br>
                                </td>
                            </tr>
                            <tr>
                        <?php }
                    } ?>
                        <td><button class="button3" name="click">Next</button></td>
                            </tr>
                        <?php } ?>
                        <form>
</body>
<?php
if ($_SESSION['clicks'] > $det) {
    $detaile_score = $conn->prepare("SELECT *FROM details_q");
    $detaile_score->execute();
    $fetch_det_score = $detaile_score->fetch(PDO::FETCH_ASSOC);
    $qry3 = $conn->prepare("SELECT `ans`, `userans` FROM `quiz_m`");
    $qry3->execute();
    $storeArray = array();
    while ($row3 = $qry3->fetch(PDO::FETCH_ASSOC)) {
        if ($row3['ans'] == $row3['userans']) {
            @$_SESSION['score'] += 1;
        }
    }
?>
    <h2>Result</h2>
    <span>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score'];
                                        //  session_unset(); 
                                        unset($_SESSION['clicks']); 
                                        unset($_SESSION['score']);
                                        ?></span><br>

    <span>Your Score:&nbsp<?php echo $no * $fetch_det_score["score"]; ?></span>

<?php
    $scor_number_mulit = $no * $fetch_det_score["score"];
   
    $insert_score=$conn->prepare("INSERT into score (scor_number_mulit,student_id)value(:scor_number_mulit,:student_id)");
    $insert_score->bindParam(":scor_number_mulit",$scor_number_mulit);
   
    $insert_score->bindParam(":student_id",$_SESSION['student_id']);
    $insert_score->execute();
    if($insert_score){
    echo "<script>alert('insert score successfuly')</script>";
    }else{
    echo "invalid";
}
}
?>
</center>
</body>

</html>

</html>