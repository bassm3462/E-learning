<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<main class="container">

<?php

if(isset($_GET['code'])){

include "conect_database.php";
$CODE=$_GET['code'];
$checkCode = $conn->prepare("SELECT SECURITY_CODE FROM user_form WHERE SECURITY_CODE = :SECURITY_CODE");
$checkCode->bindParam("SECURITY_CODE",$CODE);
$checkCode->execute();
if($checkCode->rowCount()>0){
   
$update = $conn->prepare("UPDATE user_form SET SECURITY_CODE = :NEWSECURITY_CODE ,
 ACTIVTION=true WHERE SECURITY_CODE = :SECURITY_CODE");
  $securityCode = md5(rand());
$update->bindParam("NEWSECURITY_CODE",$securityCode);
$update->bindParam("SECURITY_CODE",$CODE);
if($update->execute()){
    echo '<div class="alert alert-success" role="alert">
    The account has been verified successfully
  </div>';
  echo '<a class="btn btn-warning" href="index.php">log in</a>';
}
}else{
    echo '<div class="alert alert-danger" role="alert">
    This code is no longer valid
  </div>';
}

}
?>

  
</main>