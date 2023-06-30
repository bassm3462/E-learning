
<?php
// $course_id = $_SESSION['student_id'];
// if(!isset($student_id)){
//    header('location:/E-learningSystem/backend/students/home.php');
// }?>
<?php
include "conect_database.php";
// session_start();
// $student_id = $_SESSION['student_id'];
// if(!isset($student_id)){
//    header('location:/E-learningSystem/backend/index.php');
// }
include_once "header.php";

include "nav.php";
// $course_id=$_SESSION['course_id'];
// echo $course_id;
?>
<?php
if(isset($_GET["id"])){
$dsiplay=$conn->prepare("SELECT*FROM lessons WHERE course_id=$_GET[id] ");
$dsiplay->execute();
?>
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2> Information lessons </h2>
                </div>
                <div class="card-body">
                   
                        <?php
                            if ($dsiplay->rowCount()>0) {
                                foreach($dsiplay as $value){
                            ?>
                        <ul class="display_lessons">
                            <li class="title_lessons"><?php echo $value["chapter"]?>
                            <?php echo $value["title"]?>
                        
                        </li>
                            <li> <a href="../Techer/Upload/<?php echo $value['FILE']?>"
                                    download="<?php echo $value['FILE']?>" class="btn btn-primary ">download</a>
                                    <a href="../Techer/Upload/<?php echo $value['FILE'] ?>" target="_blank" class="btn btn-info">view file</a>
                            </li>
                           
                        </ul>
                        <?php
                                }
                            }
                            else{
?>
                   <h2 class="title_lessons">No lessons in this courses</h2> 
                        <?php      
                     }}
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>