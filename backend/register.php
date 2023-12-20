<?php

include 'conect_database.php';
include_once "header.php";
$error_name = $error_email = $error_pass = $error_cpass = "";
$name = $email = $pass = $cpass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        if (empty($_POST["name"])) {
            $error_name = "*pleas Enter your name";
        } else {
            $name = $_POST['name'];
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $error_name = "*Only letters and white space allowed";
            }
        }
        if (empty($_POST["email"])) {
            $error_email = "*Pleas Enter email address";
        } else {
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_STRING);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "*Invalid email format";
            }
        }
        if (empty($_POST["pass"])) {
            $error_pass = "*Enter your password";
        } else {
            $pass = md5($_POST['pass']);
            $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        }
        if (empty($_POST["cpass"])) {
            $error_cpass = "*Repeat Password";
        } else {
            $cpass = md5($_POST['cpass']);
            $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
        }
        $groub = $_POST['groub'];
        $groub = filter_var($groub, FILTER_SANITIZE_STRING);
        $code_verfi = md5(rand());

        //    $image = $_FILES['image']['name'];
        //    $image_tmp_name = $_FILES['image']['tmp_name'];
        //    $image_size = $_FILES['image']['size'];
        //    $image_folder = 'uploaded_img/'.$image;
        if (!empty($name) && !empty($email) && !empty($pass) && !empty($cpass)) {
            $select = $conn->prepare("SELECT * FROM user_form WHERE email = :email");
            $select->bindParam("email", $email);
            $select->execute();

            if ($select->rowCount() > 0) {
                $message[] = 'user already exist!';
            } else {
                if ($pass != $cpass) {
                    $message[] = 'confirm password not matched!';
                }
                //    elseif($image_size > 2000000){
                //       $message[] = 'image size is too large!';}
                else {
                    $insert = $conn->prepare("INSERT INTO user_form (name, email, password, user_type,SECURITY_CODE) VALUES(:name,:email,:password,:user_type,:SECURITY_CODE)");
                    $insert->bindParam("name", $name);
                    $insert->bindParam("email", $email);
                    $insert->bindParam("password", $cpass);
                    //  $insert->bindParam("image",$image);
                    $insert->bindParam("user_type", $groub);
                    $insert->bindParam("SECURITY_CODE", $code_verfi);

                    $insert->execute();
                    if ($insert) {
                        // move_uploaded_file($image_tmp_name, $image_folder);
                        $message[] = 'registered succesfully!';
                        include "mail.php";

                        $mail->addAddress($email);
                        $mail->Subject = "Validation code";
                        $mail->Body = '<h1> Thank</h1>'
                            . "<div> Account verification link " . "<div>" .
                            "<a href='http://localhost//E-learningSystem/backend/active.php?code=" . $code_verfi  . "'>
           " . "http://localhost//E-learningSystem/backend/active.php?code=" . $code_verfi . "</a>";
/
                        $mail->setFrom("bfgswr546@gmail.com", "E-learning");
                        $mail->send();
                        header('location:index.php');
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../frontend/Style/Login.css">
    <link rel="stylesheet" href="../frontend/style/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/style/bootstrap.css.map">
    <link rel="stylesheet" href="../frontend/style/bootstrap.rtl.css">
    <link rel="stylesheet" href="../frontend/Style/Create.css">
    <link rel="stylesheet" href="../frontend/Style/bootstrap-grid.rtl.min.css">
    <link rel="stylesheet" href="../frontend/Style/all.min.css">
    <link rel="stylesheet" href="../frontend/Style/bootstrap-grid.min.css">
    <!-- <link rel="stylesheet" href="style/Profile.css"> -->
    <link rel="stylesheet" href="../frontend/Style/bootstrap-theme.css">
    <!-- <link rel="stylesheet" href="../frontend/Style/bootstrap.css"> -->
    <?php include "header.php"; ?>
    <style>
        .error {
            color: red;
        }
    </style>
    <title>Register</title>
</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
    ?>
            <div class="message">
                <span><i class="fa-solid fa-circle-exclamation"></i><?php echo $message; ?></span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
    <?php
        }
    }
    ?>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="https://img.freepik.com/premium-vector/online-school-logo-learning-logo-design-vector_567288-21.jpg" style="width: 100px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1"></h4>
                                    </div>
                                    <form method="post" enctype="multipart/form-data">
                                        <p>Please Register Now</p>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="name" name="name" class="form-control" placeholder=" full name" />
                                            <span class="error"><?php echo $error_name ?></span>
                                            <!-- <label class="form-label" for="name" required>name</label> -->
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control" placeholder=" email address" />
                                            <span class="error"><?php echo $error_email ?></span>
                                            <!-- <label class="form-label" for="email" required>email</label> -->
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="pass" name="pass" class="form-control" placeholder=" password" />
                                            <span class="error"><?php echo $error_pass ?></span>
                                            <!-- <label class="form-label" for="pass" required>pass</label> -->
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="cpass" name="cpass" class="form-control" placeholder=" repeat password" />
                                            <span class="error"><?php echo $error_cpass ?></span>
                                            <!-- <label class="form-label" for="pass" required>Password</label> -->
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label for="groub">User:</label>
                                            <select class="form-control form-control-lg " name="groub" id="groub">
                                                <option value="student">student</option>
                                                <option value="teacher">teacher</option>
                                                <option value="admin">admin</option>
                                            </select>
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input type="submit" name="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"></input>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">I Already have an account?</p>
                                            <a href="index.php" class="btn btn-outline-danger">log in</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4"></h4>
                                    <p class="small mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script src="../frontend/js/login.js"></script>
</body>

</html>