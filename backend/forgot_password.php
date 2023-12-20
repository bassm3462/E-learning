<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <main class="contanier  m-auto " style="max-width:720px; margin-top:50px !important; text-align: center; ">
        <?php
        if (!isset($_GET['code'])) {
            echo '<form method="POST">
<div class="p-3 shadow mb-3">Email</div>
<input class="form-control" type="email" name="email"  required/>

<button class="btn btn-warning mt-3 w-100" type="submit" name="resetPassword" >
    resat password
</button> 
</form > ';
        } else if (isset($_GET['code']) && isset($_GET['email'])) {
            echo '<form method="POST">
<div class="p-3 shadow mb-3">
rewrit password
</div>
<input class="form-control" type="text" name="password" required/>
<button type"submit" class="btn btn-warning mt-3 w-100" name="newPassword">save</button>
</form>';
        }
        ?>
        <?php
        if (isset($_POST['resetPassword'])) {
            include "conect_database.php";

            $checkEmail = $conn->prepare("SELECT EMAIL,SECURITY_CODE FROM user_form WHERE email = :email");
            $checkEmail->bindParam("email", $_POST['email']);
            $checkEmail->execute();

            if ($checkEmail->rowCount() > 0) {
                require_once 'mail.php';
                $user = $checkEmail->fetchObject();
                $mail->addAddress($_POST['email']);
                $mail->Subject = "Reset password";
                $mail->Body = '
        link to reset password
        <br>
        ' . '<a href="http://localhost/E-learningSystem/backend/forgot_password.php?email=' . $_POST['email'] .
                    '&code=' . $user->SECURITY_CODE . '">http://localhost/E-learningSystem/backend/forgot_password.php?email=' . $_POST['email'] .
                    '&code=' . $user->SECURITY_CODE . '</a>';;

                $mail->setFrom("bfgswr546@gmail.com", "E-learning");
                $mail->send();
                echo '
        <div class="alert alert-success mt-3"> 
        The link has been sent
     </div> 
     ';
            } else {
                echo '
        <div class="alert alert-warning mt-3">
      Thise email not found
        </div> 
        ';
            }
        }
        ?>
        <?php
        if (isset($_POST['newPassword'])) {
            include "conect_database.php";
            $rpasssword = md5($_POST['password']);
            $updatePassword = $conn->prepare("UPDATE user_form SET password 
   = :password WHERE email = :email");
            $updatePassword->bindParam("password", $rpasssword);
            $updatePassword->bindParam("email", $_GET['email']);
            if ($updatePassword->execute()) {
                echo '
    <div class="alert alert-success mt-3">
    The password has been reset successfully
    </div> 
    ';
            } else {
                echo '
    <div class="alert alert-danger mt-3">
    Reset password failed
    </div>
    ';
            }
        }
        ?>
    </main>
</body>

</html>