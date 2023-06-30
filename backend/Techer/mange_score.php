<?php include "conect_database.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>score</title>
    <link rel="stylesheet" href="../../frontend/Style/Score.css">
</head>
<?php
$display_user = $conn->prepare("SELECT *FROM user_form  WHERE ID=$_GET[id] ");
$display_user->execute();
$row = $display_user->fetch(PDO::FETCH_ASSOC);

?>

<body>
    
    <div class="information_box">
       <div><h1 class="header_score">Scores Of Students</h1></div> 
        <div class="box_info">
            <div class="student_profile">
                <img src="../uploaded_img/<?= $row['image'] ?>" alt="" srcset="" width="30px">
                <h2><?=$row['name']?></h2>
            </div>

    
    <?php
    $fetch_score = $conn->prepare("SELECT *FROM score  WHERE student_id=$_GET[id] ");
    $fetch_score->execute();
    if($fetch_score->rowCount()>0){
        $score = $fetch_score->fetch(PDO::FETCH_ASSOC);
 

        // echo $scorepursuit=$score['scor_number_mulit']+$score['scor_quize']+$score['score_assigmaint'];
// echo $score['id_score'];

// }
        
    ?>
        <div class="table_score">
            <table >
                <tr>
                    <th>Student Id</th>
                    <th> Multiple Choice Score</th>
                    <th>Quiz Score</th>
                    <th>Assignment Score</th>
                    <th> Pursuit Score</th>
                    <th> Mid Score</th>
                    <th>finally Score</th>
                   

                </tr>
                <tr>
                <td> <?=$row['ID']?></td>
                <td><?= $score['scor_number_mulit']?></td>
                <td><?=$score['scor_quize']; ?></td>
                <td><?= $score['score_assigmaint'] ?></td>
                <td><?php echo $scorepursuit=$score['scor_number_mulit']+$score['scor_quize']+$score['score_assigmaint'];?></td>
                <td><?=$score['scor_mid']  ?></td>
                <td><?= $score['scor_finally']  ?></td>





                </tr>
              
            </table>
        </div>
    <?php
}
    else{
        echo "no score";
    }
    ?>
        </div>
    </div>
</body>

</html>