
<?php 
include "conect_database.php";

?>
<section>
        <?php
        $show_details = $conn->prepare("SELECT *FROM details_q course_id=$_GET[id]");
        $show_details->execute();
        ?>
        <?php
        foreach ($show_details as $row) {
        ?><div class="container">
                <div>
                    <p> quiz the number of questions is <?php echo $row['number_of_que'] ?> and each questions score is <?php echo $row['score'] ?></p>
                </div>
                <div> <a href="quiz_multi_choes.php?id=<?php echo $row["id_det"] ?>">More details</a></div>
            <?php } ?>

            </div>
    </section>