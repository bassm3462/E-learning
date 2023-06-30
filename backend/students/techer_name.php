<?php include("../conect_database.php");
include "header.php";
include "nav.php";
// include("../Config.php");
$student = $conn->prepare("SELECT * FROM user_form WHERE user_type='teacher'");
$student->execute();
?>
<div class="containr">
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2> Information Teacher</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name Teachers</th>
                            <th>Email</th>
                            <th>image profile</th>
                            <!-- <th>date</th> -->
                            <th>action</th>
                        </tr>
                        <?php
                        if ($student->rowCount() > 0) {
                            foreach ($student as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><img src="../uploaded_img/<?php echo $row["image"]; ?>" alt="" width="200px" height="200px" ;></td>

                                    <td><i class="fa-solid fa-trash-can-xmark"></i></td>
                                    <td>
                                        <?php

                                        $id = filter_var($row['ID'], FILTER_SANITIZE_NUMBER_INT, FILTER_VALIDATE_INT);
                                        $id = encryptor('encrypt', $id);
                                        ?>
                                        <a href="discussion.php?id=<?php echo $id ?>"><i class="fa-solid fa-message btn btn-info"></i></a>

                                    </td>
                                </tr>

                        <?php
                            }
                        } else {

                            echo "<td>no student</td>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>