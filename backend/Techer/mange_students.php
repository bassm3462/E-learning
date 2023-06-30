<?php
include ("nvigation_tech.php");
include ("../conect_database.php");
include("../Config.php");
include "header.php";
?>
<?php
$student=$conn->prepare("SELECT * FROM user_form WHERE user_type='student'");
$student->execute();
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2> information student</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name Student</th>
                            <th>Email</th>
                            <th>image profile</th>
                            <th>date</th>
                            <th>action</th>
                        </tr>
                        <?php
if($student->rowCount()>0){
foreach($student as $row){
    $id=filter_var($row['ID'],FILTER_SANITIZE_NUMBER_INT,FILTER_VALIDATE_INT);
    $id=encryptor('encrypt',$id); 

    ?>
                        <tr>
                            <td><?php echo $row["name"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td><img src="../uploaded_img/<?php echo $row["image"];?>" alt="" width="200px"
                                    height="200px" ;></td>
                            <td><i class="fa-solid fa-trash-can-xmark"></i></td>
                            <td>
                                <!-- <a href="delete_student.php?id=<?php echo $row["ID"]?>" class="btn btn-info"><img src="../../frontend/image/delet_student.png" alt="" srcset="" width="30px">  </a> -->
                                <?php ?>
                                <a href="dscu2.php?id=<?php echo $id ?>&user=<?php echo htmlspecialchars($row['user_type'])?>"class="btn btn-info"><img src="../../frontend/image/discussion.jpg" alt="" srcset=""width="30px"></a>
                                <a href="sent_file_from_student.php?id=<?php echo $id ?>"class="btn btn-info" ><img src="../../frontend//image/receive-mail.png" alt="" srcset=""width="30px"></a>
                                <a href="Receive_quiz.php?id=<?php echo $id ?>"class="btn btn-info" ><img src="../../frontend//image/quiz.png" alt="" srcset=""width="30px"></a>
                                <a href="mange_score.php?id=<?php echo $id ?>"class="btn btn-info" ><img src="../../frontend//image/png-clipart-computer-icons-score-miscellaneous-text-thumbnail.png" alt="" srcset=""width="30px" height="30px"></a>



                            </td>
                        </tr>
                        <?php
}
}
    else {

        echo "<td>no student</td>";
}

?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>