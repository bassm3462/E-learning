<?php include ("../conect_database.php");
include "header.php";
 include "nav.php";?>
 
 
 
 <?php
 function queryStudent($conn){
    $student=$conn->prepare("SELECT * FROM user_form WHERE user_type='student'");
    $student->execute();

 ?>
 <div class="containr">
 </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h2> information students</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
    
                            <tr>
                                <th>Name Student</th>
                                <th>Email</th>
                                <th>image profile</th>
                                <th>action</th>
                            </tr>
    <?php
    if($student->rowCount()>0){
    foreach($student as $row){
        ?>
        <tr>
    <td><?php echo $row["name"];?></td>
    <td><?php echo $row["email"];?></td>
    <td><img src="../uploaded_img/<?php echo $row["image"];?>" alt=""   width="200px" height="200px";></td>
    
    <td><a href="delete_student.php?id=<?php echo $row["ID"]?>"><i class="fa-solid fa-trash-can btn btn-dark" ></i></a>
    <a href="dscu2.php?id=<?php echo $row["ID"]?>"><i class="fa-solid fa-message btn btn-info"></i></a>
    
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
    
    
    <?php }
 queryStudent($conn);?>
 <?php
 