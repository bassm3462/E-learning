<?php
$servername="localhost";
$username="root";
$password="";
try{
    $conn = new PDO("mysql:host=$servername;dbname=my_project2", $username, $password);
 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
 catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
 header('location:/E-learningSystem/backend/index.php');
}

?>
<?php

include ("conect_database.php ");

if ($_SERVER["REQUEST_METHOD"]="POST"){
    if(isset($_POST["save"])){


$fileType = $_FILES["file"]["type"];
$fileName = $_FILES["file"]["name"];
$file = $_FILES["file"]["tmp_name"];
$chapter=$_POST["fname"];
$title=$_POST[ "Tname"];
$subject=$_POST["subject"];

move_uploaded_file($file,"Upload/".$fileName);
$position="Upload/".$fileName;

$upload_file=$conn->prepare("INSERT INTO lessons(chapter,title ,FILE_TYPE,FILE ,POSITION, Subject )VALUE(:chapter,:title,:FILE_TYPE,:FILE,:POSITION ,:Subject)");
$upload_file->bindParam(":FILE_TYPE",$fileType);
$upload_file->bindParam(":FILE",$fileName);
$upload_file->bindParam(":chapter",$chapter);
$upload_file->bindParam(":title",$title);
$upload_file->bindParam(":POSITION",$position);
$upload_file->bindParam(":Subject",$subject);
if($upload_file->execute()){
    echo '<script> alert("The file has been uploaded successfully")</script>';
}
else{
    echo '<div class="alert alert-danger" role="alert">>invald</div>';
}
}}
?>
<?php include "nvigation_tech.php"?>

<!-- <li><button type="button" class="btn btn-primary">Primary</button></li>
<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button> -->

</div>
<div class="container" id="box">
    <button class="add btn btn-info ho " onclick="myadd()">Add lessons</button>
</div>
<div class="container">
    <div class="lessons" id="lessons">
        <button class="close btn btn-success " onclick="myclose()"><i class="fa-solid fa-xmark"></i></button>
        <h1>list lessons</h1>

        <form method="post" enctype="multipart/form-data">
            <label for="fname">Subject</label>
            <input class="form-control form-control-lg" type="text" name="subject" id="subject" placeholder="subject"
                required>
            <label for="fname">Lecture</label>
            <input class="form-control form-control-lg" type="text" name="fname" id="fname" placeholder="chapter"
                required>
            <label for="Tname">Title</label>
            <input class="form-control form-control-lg" type="text" name="Tname" id="Tname" placeholder="title file"
                required>

            <label for="file">Upload file:</label>
            <input type="file" name="file" id="upload" required>
            <button type="submit" name="save" class="btn btn-primary">save</button>
        </form>
    </div>
</div>


<?php
include "conect_database.php";
$dsiplay=$conn->prepare("SELECT*FROM lessons");
$dsiplay->execute();
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2> info to table</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Lecture</th>
                            <th>Title</th>
                            <th>File type</th>
                            <th>File</th>
                            <th width="300px">action</th>
                        </tr>
                        <?php
                            if ($dsiplay->rowCount()>0){
                                foreach($dsiplay as $value){
                            ?>
                        <tr>
                            <td><?php echo $value["chapter"]?></td>
                            <td><?php echo $value["title"]?></td>
                            <td><?php echo $value["FILE_TYPE"]?></td>
                            <td><?php echo "<a href='". $value["POSITION"] . "' download>".$value["FILE"].""?><i
                                    class="fa-sharp fa-solid fa-download"></i></a>
                            </td>
                            <td> <a href="Delete.php?id=<?php echo $value["ID"]?>" class="btn btn-success">Delete</a>
                                <a href="edit.php?id=<?php echo $value["ID"]?>" class="btn btn-primary"> Edit</a>

                            </td>
                        </tr>
                        <?php
                                }
                            }
                            else{
?>
                        <tr>
                            <td>no file</td>
                        </tr>
                        <?php      
                    }
?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"?>