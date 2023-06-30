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
</head>
<body>
<center><h1>Quiz</h1>
</center>
    <?php if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $id = encryptor('decrypt', $id);
        $dsiplay = $conn->prepare("SELECT*FROM user_form WHERE ID=$id");
        $dsiplay->execute();
        foreach ($dsiplay as $row) {
    ?><section id="information_user">
                <div class="">
                    <h3>Name Student is :<?php echo $row['name'] ?></h3>
                    <p>Email is : <?php echo $row['email'] ?></p>
                    <?php
                    // echo $_SESSION['teacher_id'];
                }
                $dsiplay = $conn->prepare("SELECT*FROM quize WHERE student_id=$_GET[id] AND  teacher_id = $_SESSION[teacher_id]");
                $dsiplay->execute();
                foreach ($dsiplay as $value) {
                    if ($dsiplay->rowCount() > 0) {
                    ?>
                        <div>
                            <h3> <img src="../../frontend/image/paper.png" alt="" srcset="" class="imag_upload" width=""> <a href="Upload/<?php echo $value['file'] ?>" target="_blank">view
                                    file</a> </h3>
                            <?php $dsiplay_scor = $conn->prepare("SELECT*FROM score  WHERE student_id=$id AND  teacher_id = $_SESSION[teacher_id]");
                            $dsiplay_scor->execute();
                            foreach ($dsiplay_scor as $scor) {
                            ?>
                                <form action="" method="POST">
                                    <input type="number" value="<?php echo $scor['score_assigmaint'] ?>">
                                    <button type="submit" name="save">save</button>
                                </form>
                        </div>
                    <?php }
                        } else {
                    ?><h2>no file</h2><?php
                        }
                    }
                }
                        ?>
                </div>
            </section>
            <?php
            ?>
</body>
</html>