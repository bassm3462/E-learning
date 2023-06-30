<?php
include "conect_database.php";
include "header.php";
include "../Config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/Style/assignmeant.css">
    <title>Document</title>
    <link rel="stylesheet" href="../../frontend/Style/score.css">

</head>
<body>


    <?php if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
    //    $id = encryptor('decrypt', $id);
        $dsiplay = $conn->prepare("SELECT*FROM user_form WHERE ID=$id");
        $dsiplay->execute();
        foreach ($dsiplay as $row) {
    ?><section id="information_box">
                <div class="box_info container">
                <center><h1>Assignments</h1>
</center>

                    <h3>Name Student is :<?php echo $row['name'] ?></h3>
                    <p>Email is : <?php echo $row['email'] ?></p>
                    <?php
                    // echo $_SESSION['teacher_id'];
                }
                $dsiplay = $conn->prepare("SELECT*FROM assignment WHERE student_id=$_GET[id] AND  teacher_id = $_SESSION[teacher_id]");
                $dsiplay->execute();
                // if ($dsiplay->rowCount() > 0) {
                foreach ($dsiplay as $value) {
                    
                    ?>
                        <div class="" >
                            <div>
                            <h3> <img src="../../frontend/image/paper.png" alt="" srcset="" class="imag_upload" width=""> <a href="Upload/<?php echo $value['file'] ?>" target="_blank">view
                                    file</a> </h3>
                            <?php $dsiplay_scor = $conn->prepare("SELECT*FROM score  WHERE student_id=$_GET[id]");
                            $dsiplay_scor->execute();
                            $score = $dsiplay_scor->fetch(PDO::FETCH_ASSOC);

                            ?>
                                <form action="cod.php" method="POST">
                                    <input type="text" name="score_update" value="<?php echo $score['score_assigmaint'] ?>">
                                    <button type="submit" name="save_score_assgi">save</button>
                                </form>
                        </div>

                    <?php }
                        } 
                   
                        ?>
                </div>
                </div>
            </section>
            <?php
            ?>
</body>
</html>